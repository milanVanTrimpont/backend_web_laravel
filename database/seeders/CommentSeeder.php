<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('comments')->insert([
            [
                'id' => '1',
                'body' => 'Wauw!',
                'user_id' => '1',
                'kleding_item_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '2',
                'body' => 'super!',
                'user_id' => '1',
                'kleding_item_id' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '3',
                'body' => 'top!',
                'user_id' => '1',
                'kleding_item_id' => '3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '4',
                'body' => 'lelijk!',
                'user_id' => '1',
                'kleding_item_id' => '4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '5',
                'body' => 'hoeveel kost het?',
                'user_id' => '1',
                'kleding_item_id' => '5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
                
            ]);
    }
}
