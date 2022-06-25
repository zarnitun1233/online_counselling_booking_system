<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Question;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Admin account factory
         */
        User::create([
            'name' => "admin",
            'email' => "admin@gmail.com",
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // password
            'role' => "2",
            'phone' =>"09765665667",
            'address' =>"1/2, 55th street",
            'remember_token' => Str::random(10),
        ]);

        /**
         * Sample Counsellor account factory
         */        
        User::factory()->count(40)->create();

        /**
         * Question 20 data factory for 20 counsellors
         */
        Question::factory()->count(40)->create();
    }
}
