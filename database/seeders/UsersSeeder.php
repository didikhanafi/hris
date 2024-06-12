<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Sample Dummy Users Array
        $users = [
            [
                'name'=>'Administrator',
                'email'=>'admin@hrisapp.com',
                'password'=> Hash::make('admin123')
            ],
            [
                'name'=>'Pegawai 1',
                'email'=>'pegawai@hrisapp.com',
                'password'=> Hash::make('pegawai123')
            ],
        ];

        // Looping and Inserting Array's Users into User Table
        foreach($users as $user){
            User::create($user);
        }
    }
}
