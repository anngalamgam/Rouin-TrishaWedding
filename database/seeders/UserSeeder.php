<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        Role::firstOrCreate(['name' => 'Super admin', 'guard_name' => 'web']);

        $admins = [
            ['name' => 'lif',  'email' => 'admin.alif@mail.com', 'password' => 'superalifadmin'],
            ['name' => 'pika', 'email' => 'admin.pika@mail.com', 'password' => 'superpikaadmin'],
        ];

        foreach ($admins as $a) {
            $user = User::firstOrCreate(
                ['email' => $a['email']],
                [
                    'name'              => $a['name'],
                    'password'          => Hash::make($a['password']),
                    'email_verified_at' => now(),
                ]
            );

            $user->assignRole('Super admin');
        }
    }
}