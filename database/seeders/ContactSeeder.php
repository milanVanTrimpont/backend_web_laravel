<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contact')->insert([
            [
                'email' => 'johndoe@example.com',
                'onderwerp' => 'Problemen met inloggen',
                'vraag' => 'Ik kan niet inloggen op mijn account. Wat moet ik doen?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'janedoe@example.com',
                'onderwerp' => 'Bestelling niet ontvangen',
                'vraag' => 'Mijn bestelling is nog steeds niet aangekomen. Kunt u me helpen?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'peterparker@example.com',
                'onderwerp' => 'Probleem met betaling',
                'vraag' => 'Mijn betaling wordt niet geaccepteerd. Wat kan ik doen?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'maryjane@example.com',
                'onderwerp' => 'Product beschadigd ontvangen',
                'vraag' => 'Het product dat ik heb ontvangen is beschadigd. Hoe kan ik dit retourneren?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'lucas@example.com',
                'onderwerp' => 'Accountinstellingen wijzigen',
                'vraag' => 'Hoe kan ik mijn accountinstellingen aanpassen?',
                'created_at' => now(),
                'updated_at' => now(),
            ]
                
            ]);
    }
}
