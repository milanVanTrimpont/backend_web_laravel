<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaqsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('faqs')->insert([
            [
                'categorie_id' => '1',
                'vraag' => 'Ik heb een verkeerd adres meegegeven',
                'antwoord' => 'niks',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categorie_id' => '1',
                'vraag' => 'Wat als mijn pakketje niet toekomt?',
                'antwoord' => 'Dan wordt er nagekeken of het pakketje verzonden is.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categorie_id' => '2',
                'vraag' => 'Hoe retour ik een pakketje?',
                'antwoord' => 'Je moet een label afprinten en dit aan de buitenkant van je pakketje plakken. dan kan je dit bij een postpunt terugbrengen.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categorie_id' => '3',
                'vraag' => 'Is deze website betrouwbaar?',
                'antwoord' => 'Jazeker!!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categorie_id' => '1',
                'vraag' => 'Wat als mijn pakketje gestolen wordt?',
                'antwoord' => 'Dan heb je pech.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
                
            ]);
    }
}
