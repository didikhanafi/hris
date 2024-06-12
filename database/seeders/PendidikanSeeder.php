<?php

namespace Database\Seeders;

use App\Models\MasterPendidikan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PendidikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Sample Dummy Pendidikan Array
        $pendidikan = [
            [
                'pendidikancode'=>'PD00001',
                'pendidikan'=>'SD',
                // 'password'=> Hash::make('javed1234')
            ],
            [
                'pendidikancode'=>'PD00001',
                'pendidikan'=>'SMP',
                // 'password'=> Hash::make('javed1234')
            ],
            [
                'pendidikancode'=>'PD00001',
                'pendidikan'=>'SMA',
                // 'password'=> Hash::make('javed1234')
            ],
            [
                'pendidikancode'=>'PD00001',
                'pendidikan'=>'Strata I',
                // 'password'=> Hash::make('javed1234')
            ],
            [
                'pendidikancode'=>'PD00001',
                'pendidikan'=>'Strata II',
                // 'password'=> Hash::make('javed1234')
            ],
        ];

        // Looping and Inserting Array's Users into User Table
        foreach($pendidikan as $rowpendidikan){
            MasterPendidikan::create($rowpendidikan);
        }
    }
}
