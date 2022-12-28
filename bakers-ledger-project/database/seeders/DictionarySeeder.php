<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DictionarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // GRADE
        \App\Models\Grade::factory()->create(['title' => 'Мука пшеничная цельнозерновая', 'user_id' => 1]);
        \App\Models\Grade::factory()->create(['title' => 'Мука пшеничная 1-го сорта', 'user_id' => 1]);
        \App\Models\Grade::factory()->create(['title' => 'Мука пшеничная 2-го сорта', 'user_id' => 1]);
        \App\Models\Grade::factory()->create(['title' => 'Мука пшеничная высшего сорта хлебопекарская', 'user_id' => 1]);
        \App\Models\Grade::factory()->create(['title' => 'Мука пшеничная крупчатка', 'user_id' => 1]);
        \App\Models\Grade::factory()->create(['title' => 'Мука гречневая', 'user_id' => 1]);
        \App\Models\Grade::factory()->create(['title' => 'Мука рисовая', 'user_id' => 1]);
        \App\Models\Grade::factory()->create(['title' => 'Мука овсяная', 'user_id' => 1]);
        \App\Models\Grade::factory()->create(['title' => 'Мука соевая', 'user_id' => 1]);
        \App\Models\Grade::factory()->create(['title' => 'Мука миндальная', 'user_id' => 1]);

        // LEGAL
        \App\Models\Legal::factory()->create(['title' => 'Общество с ограниченной ответственностью', 'user_id' => 1]);
        \App\Models\Legal::factory()->create(['title' => 'Акционерное общество', 'user_id' => 1]);
        \App\Models\Legal::factory()->create(['title' => 'Открытое акционерное общество', 'user_id' => 1]);
        \App\Models\Legal::factory()->create(['title' => 'Закрытое акционерное общество', 'user_id' => 1]);
        \App\Models\Legal::factory()->create(['title' => 'Частное предприятие', 'user_id' => 1]);
        \App\Models\Legal::factory()->create(['title' => 'Публичное акционерное общество', 'user_id' => 1]);
        \App\Models\Legal::factory()->create(['title' => 'Кооператив', 'user_id' => 1]);
    }
}
