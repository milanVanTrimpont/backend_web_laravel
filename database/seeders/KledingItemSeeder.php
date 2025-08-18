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
            'foto' => 'kleding/vintagebroek.png',
            'content'=> 'dit is een vintage broek uit de jaren 80.',
            'created_at'=> now(),
            'updated_at'=> now(), 
        ],

        [
            'titel' => 'Jeans Jas',
            'foto' => 'kleding/jeans_jas.png',
            'content' => 'Een stoere donder blause jeans jas die je stijl en kracht uitstraalt.',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [
            'titel' => 'Lange Wollen Jas',
            'foto' => 'kleding/lange_wollen_jas.jpg',
            'content' => 'Een lange wollen jas ideaal voor de koude winterdagen. Comfortabel en warm.',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [
            'titel' => 'Gestreepte T-shirt',
            'foto' => 'kleding/gestreept_tshirt.png',
            'content' => 'Een comfortabel gestreept T-shirt dat je zowel casual als formeel kunt dragen.',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        
        [
            'titel' => 'Lichtblauwe Jeans',
            'foto' => 'kleding/lichtblauwe_jeans.png',
            'content' => 'Een klassieke lichtblauwe jeans die nooit uit de mode raakt, perfect voor elke gelegenheid.',
            'created_at' => now(),
            'updated_at' => now(),
        ]
            
        ]);

    }
}
