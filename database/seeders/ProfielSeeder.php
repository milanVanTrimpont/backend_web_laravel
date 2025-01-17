<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfielSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('profielen')->insert([
            [
                'user_id' => '1',
                'gebruikersnaam' => 'Milan',
                'bio' => 'Dit is mijn bio.',
                'profielfoto' => '',
                'created_at' => now(), 
                'updated_at' => now(), 



            ],
            [
                'user_id' => '2',
                'gebruikersnaam' => 'Admin',
                'bio' => 'Dit is mijn bio.',
                'profielfoto' => '',
                'created_at' => now(), 
                'updated_at' => now(), 
            ]
        ]);
    }
}
