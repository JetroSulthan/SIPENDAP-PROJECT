<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'mhmdbambang',
            'password' => 'b4mb4ng00',
            'roles_id' => 2
        ]);
        User::create([
            'username' => 'adminSIPPENDAP',
            'password' => 'admin123',
            'roles_id' => 1
        ]);
        User::create([
            'username' => 'saifulkuncoro',
            'password' => 'kuncoro0823',
            'roles_id' => 3
        ]);
    }
}
