<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Settlement
        \App\Models\Settlement::factory(4000)->create();

        // District
        \App\Models\District::factory(8000)->create();

        // Shops
        \App\Models\Shop::factory(5000)->create();

        // Owner
        // \App\Models\Owner::factory(200)->create();

        // Company
        // \App\Models\Company::factory(50)->create();

        // Company & Owner, each one and many-to-many in between
        // 50 companies, and for each 4 more users of it, are generated
        \App\Models\Company::factory(2000)
            ->has(\App\Models\Owner::factory()->count(4))
            ->create();

        \App\Models\Trademark::factory(6000)->create();
    }
}
