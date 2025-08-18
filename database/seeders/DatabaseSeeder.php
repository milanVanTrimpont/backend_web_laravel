<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(KledingItemSeeder::class);
        $this->call(CategorieënSeeder::class);
        $this->call(ContactSeeder::class);
        $this->call(FaqsSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ProfielSeeder::class);
        $this->call(CommentSeeder::class);

    
    }
}
