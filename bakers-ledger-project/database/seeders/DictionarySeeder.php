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
        \App\Models\Grade::factory()->create(['title' => 'Мука пшеничная цельнозерновая']);
        \App\Models\Grade::factory()->create(['title' => 'Мука пшеничная 1-го сорта']);
        \App\Models\Grade::factory()->create(['title' => 'Мука пшеничная 2-го сорта']);
        \App\Models\Grade::factory()->create(['title' => 'Мука пшеничная высшего сорта хлебопекарская']);
        \App\Models\Grade::factory()->create(['title' => 'Мука пшеничная крупчатка']);
        \App\Models\Grade::factory()->create(['title' => 'Мука гречневая']);
        \App\Models\Grade::factory()->create(['title' => 'Мука рисовая']);
        \App\Models\Grade::factory()->create(['title' => 'Мука овсяная']);
        \App\Models\Grade::factory()->create(['title' => 'Мука соевая']);
        \App\Models\Grade::factory()->create(['title' => 'Мука миндальная']);

        // LEGAL
        \App\Models\Legal::factory()->create(['title' => 'Общество с ограниченной ответственностью']);
        \App\Models\Legal::factory()->create(['title' => 'Акционерное общество']);
        \App\Models\Legal::factory()->create(['title' => 'Открытое акционерное общество']);
        \App\Models\Legal::factory()->create(['title' => 'Закрытое акционерное общество']);
        \App\Models\Legal::factory()->create(['title' => 'Частное предприятие']);
        \App\Models\Legal::factory()->create(['title' => 'Публичное акционерное общество']);
        \App\Models\Legal::factory()->create(['title' => 'Кооператив']);
    }
}
