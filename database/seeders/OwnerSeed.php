<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OwnerSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' =>'OWNER',
            'email' => 'OWNER@EXAMPLE.COM',
            'password'=>Hash::make('Kujenibepuntoretemi'),
        ]);

        $user -> assignRole('Owner');
    }
}
