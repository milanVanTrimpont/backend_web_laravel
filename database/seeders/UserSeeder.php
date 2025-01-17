<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Milan Van Trimpont',
                'usertype' => 'user',
                'email' => 'milanvt18@gmail.com',
                'email_verified_at' =>null,  
                'password' => Hash::make('Password!321'), 
                'id' => 1,
                'remember_token' => Str::random(60), // Random gegenereerde remember token
                'created_at' => now(), 
                'updated_at' => now(), 
            ],
            [
                'name' => 'Admin',
                'usertype' => 'admin',
                'email' => 'admin@ehb.be',
                'email_verified_at' =>null,  
                'password' => Hash::make('Password!321'), 
                'id' => 2,
                'remember_token' => Str::random(60), // Random gegenereerde remember token
                'created_at' => now(), 
                'updated_at' => now(), 
            ]
                
            ]);


    }
}
