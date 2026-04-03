<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Address;
use App\Models\User;

class AddressSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {

            // Create 1–2 addresses per user
            $addresses = Address::factory()
                ->count(rand(1,2))
                ->create([
                    'user_id' => $user->id
                ]);

            // Make one default address
            $addresses->first()->update([
                'is_default' => true
            ]);
        }
    }
}