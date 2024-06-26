<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'nama_role' => 'Admin'
        ]);

        Role::create([
            'nama_role' => 'Pemerintah'
        ]);

        Role::create([
            'nama_role' => 'Kelompok Tani'
        ]);
    }
}
