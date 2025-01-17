<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KledingItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('kleding_items')->insert([
        [   
            'titel' => 'vintage broek',
            'foto' => 'vintageBroek.png',
            'content'=> 'dit is een vintage broek uit de jaren 80.',
            'created_at'=> now(),
            'updated_at'=> now(), 
        ],

        [
            'titel' => 'Zwarte Leren Jas',
            'foto' => 'zwarte_leren_jas.png',
            'content' => 'Een stoere zwarte leren jas die je stijl en kracht uitstraalt.',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [
            'titel' => 'Lange Wollen Jas',
            'foto' => 'lange_wollen_jas.png',
            'content' => 'Een lange wollen jas ideaal voor de koude winterdagen. Comfortabel en warm.',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [
            'titel' => 'Gestreepte T-shirt',
            'foto' => 'gestreept_tshirt.png',
            'content' => 'Een comfortabel gestreept T-shirt dat je zowel casual als formeel kunt dragen.',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        
        [
            'titel' => 'Lichtblauwe Jeans',
            'foto' => 'lichtblauwe_jeans.png',
            'content' => 'Een klassieke lichtblauwe jeans die nooit uit de mode raakt, perfect voor elke gelegenheid.',
            'created_at' => now(),
            'updated_at' => now(),
        ]
            
        ]);

    }
}
