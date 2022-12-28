<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // calling additional seeder to fill Users
        $this->call([UserSeeder::class]);

        // calling additional seeder to fill Legals and Grades
        $this->call([DictionarySeeder::class]);

        // calling additional seeder to fill the rest of the table with standard entries
        $this->call([RestSeeder::class]);

        // calling additional seeder to fill only the Deliveries table
        // $this->call([DeliverySeeder::class]);










        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
