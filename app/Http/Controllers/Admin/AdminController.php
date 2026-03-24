<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Trade;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $itemCount = Item::count();
        $tradeCount = Trade::count();

        return view('admin.dashboard', compact('userCount', 'itemCount', 'tradeCount'));
    }
}
