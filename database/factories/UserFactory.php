<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use App\Models\User;

class UserFactory extends Factory
{
    protected static ?string $password = null;

    public function definition(): array
    {
        $directory = storage_path('app/public/avatars');

        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        $name = fake()->name();
        $filename = Str::uuid() . '.png';
        $path = $directory . '/' . $filename;

        try {
            $url = 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=random&size=200';
            $imageContent = Http::timeout(10)->get($url)->body();

            if (empty($imageContent)) {
                throw new \Exception('Geen avatar ontvangen');
            }

            file_put_contents($path, $imageContent);
            $avatarPath = 'storage/avatars/' . $filename;
        } catch (\Exception $e) {
            $avatarPath = 'storage/avatars/default.png';
        }

        return [
            'name' => $name,
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'avatar' => $avatarPath,
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}

