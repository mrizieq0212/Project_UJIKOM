<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'muhammad rizieq',
                'email' => 'ehsepeda@gmail.com',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'no_hp' => '085122190105',
                'alamat' => 'Baleendah, Bandung',
            ],
            [
                'name' => 'Bagus Karim',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'no_hp' => '081234567890',
                'alamat' => 'Bandung, West Java',
            ],
            [
                'name' => 'rizik',
                'email' => 'rizikk@gmail.com',
                'password' => Hash::make('password123'),
                'role' => 'petugas',
                'no_hp' => '082345678901',
                'alamat' => 'Baleendah, Bandung',
            ],
            [
                'name' => 'azhari',
                'email' => 'asarisurya@gmail.com',
                'password' => Hash::make('password123'),
                'role' => 'petugas',
                'no_hp' => '085123467770',
                'alamat' => 'Bumi Sari Indah, Bandung',
            ],
            [
                'name' => 'Rian Setiawan',
                'email' => 'rian@gmail.com',
                'password' => Hash::make('password123'),
                'role' => 'peminjam',
                'no_hp' => '083456789012',
                'alamat' => 'Ciparay, Bandung',
            ],
            [
                'name' => 'Siti Aminah',
                'email' => 'siti@gmail.com',
                'password' => Hash::make('password123'),
                'role' => 'peminjam',
                'no_hp' => '084567890123',
                'alamat' => 'Dayeuhkolot, Bandung',
            ],
            [
                'name' => 'Eka Pratama',
                'email' => 'eka@gmail.com',
                'password' => Hash::make('password123'),
                'role' => 'peminjam',
                'no_hp' => '085678901234',
                'alamat' => 'Banjaran, Bandung',
            ],
            [
                'name' => 'herdi',
                'email' => 'herdifirdaus@gmail.com',
                'password' => Hash::make('password123'),
                'role' => 'peminjam',
                'no_hp' => '098712347654',
                'alamat' => 'Ciparay, Bandung',
            ],
            [
                'name' => 'rama',
                'email' => 'ramaramdani@gmail.com',
                'password' => Hash::make('password123'),
                'role' => 'peminjam',
                'no_hp' => '089712435678',
                'alamat' => 'Munjul, Bandung',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}