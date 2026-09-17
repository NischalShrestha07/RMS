<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TestRoleUserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            'admin' => ['name' => 'Admin User', 'email' => 'admin@sarab.test'],
            'kitchen' => ['name' => 'Kitchen Staff', 'email' => 'kitchen@sarab.test'],
            'rider' => ['name' => 'Delivery Rider', 'email' => 'rider@sarab.test'],
            'customer' => ['name' => 'Sample Customer', 'email' => 'customer@sarab.test'],
        ];

        foreach ($users as $role => $data) {
            $user = User::updateOrCreate(
                ['email' => $data['email']],
                ['name' => $data['name'], 'password' => Hash::make('password'), 'email_verified_at' => now()]
            );
            $user->syncRoles([$role]);
        }
    }
}
