<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieënSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorieën')->insert([
            [   
                'id' => '1',
                'naam' => 'Levering',
                'created_at'=> now(),
                'updated_at'=> now(), 
            ],
    
            [
                'id' => '2',
                'naam' => 'Retour',
                'created_at' => now(),
                'updated_at' => now(),
            ],
    
            [
                'id' => '3',
                'naam' => 'Andere vragen',
                'created_at' => now(),
                'updated_at' => now(),
            ],
                
            ]);
    }
}
