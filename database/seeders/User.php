<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create ([
            'username' => 'ahmadmahfud',
            'password' => '0314ahmd_mfd'
        ]);

        User::create ([
            'username' => 'mhmdbambang',
            'password' => 'b4mb4ng00'
        ]);

        User::create ([
            'username' => 'sitiharyani',
            'password' => 'Haryani_77Siti'
        ]);
    }
}
