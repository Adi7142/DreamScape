<?php

namespace App\Http\Controllers;

use App\Models\Trade;
use App\Models\User;
use App\Models\Inventory;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TradeController extends Controller
{
    public function index(Request $request)
    {
        $receivedTrades = Trade::with(['sender', 'item'])
            ->where('receiver_id', $request->user()->id)
            ->latest()
            ->get();

        $sentTrades = Trade::with(['receiver', 'item'])
            ->where('sender_id', $request->user()->id)
            ->latest()
            ->get();

        return view('trades.index', compact('receivedTrades', 'sentTrades'));
    }

    public function create(Request $request)
    {
        $users = User::where('id', '!=', $request->user()->id)->get();
        $inventoryItems = $request->user()->inventories()->with('item')->get();

        return view('trades.create', compact('users', 'inventoryItems'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'receiver_id' => ['required', 'exists:users,id'],
            'item_id' => ['required', 'exists:items,id'],
        ]);

        $ownsItem = Inventory::where('user_id', $request->user()->id)
            ->where('item_id', $data['item_id'])
            ->where('quantity', '>', 0)
            ->exists();

        if (!$ownsItem) {
            return back()->with('error', 'You do not own this item.');
        }

        Trade::create([
            'sender_id' => $request->user()->id,
            'receiver_id' => $data['receiver_id'],
            'item_id' => $data['item_id'],
            'status' => 'pending',
        ]);

        Notification::create([
            'user_id' => $data['receiver_id'],
            'message' => 'You received a new trade request.',
            'is_read' => false,
        ]);

        return redirect()->route('trades.index')->with('success', 'Trade request sent successfully.');
    }

    public function accept(Trade $trade, Request $request)
    {
        if ($trade->receiver_id !== $request->user()->id) {
            abort(403);
        }

        if ($trade->status !== 'pending') {
            return back()->with('error', 'This trade request was already handled.');
        }

        DB::transaction(function () use ($trade) {
            $senderInventory = Inventory::where('user_id', $trade->sender_id)
                ->where('item_id', $trade->item_id)
                ->lockForUpdate()
                ->first();

            if (!$senderInventory || $senderInventory->quantity < 1) {
                abort(400, 'Sender no longer owns this item.');
            }

            $senderInventory->quantity -= 1;

            if ($senderInventory->quantity === 0) {
                $senderInventory->delete();
            } else {
                $senderInventory->save();
            }

            $receiverInventory = Inventory::firstOrCreate(
                [
                    'user_id' => $trade->receiver_id,
                    'item_id' => $trade->item_id,
                ],
                [
                    'quantity' => 0,
                ]
            );

            $receiverInventory->quantity += 1;
            $receiverInventory->save();

            $trade->update([
                'status' => 'accepted',
            ]);

            Notification::create([
                'user_id' => $trade->sender_id,
                'message' => 'Your trade request was accepted.',
                'is_read' => false,
            ]);
        });

        return back()->with('success', 'Trade request accepted.');
    }

    public function decline(Trade $trade, Request $request)
    {
        if ($trade->receiver_id !== $request->user()->id) {
            abort(403);
        }

        if ($trade->status !== 'pending') {
            return back()->with('error', 'This trade request was already handled.');
        }

        $trade->update([
            'status' => 'declined',
        ]);

        return back()->with('success', 'Trade request declined.');
    }
}
