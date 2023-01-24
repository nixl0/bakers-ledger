<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // automatic generation
        \App\Models\User::factory()->create([
            'role' => User::IS_ADMIN,
            'name' => 'automatic_generation',
            'email' => 'automatic@ledger.com',
            'password' => bcrypt('j2gekPB$2eG5') // TODO not secure
        ]);

        // dummy_reader
        \App\Models\User::factory()->create([
            'role' => User::IS_READER,
            'name' => 'dummy_reader',
            'email' => 'reader@ledger.com',
            'password' => bcrypt('6i%T8ak3np&7') // TODO not secure
        ]);

        // dummy_admin
        \App\Models\User::factory()->create([
            'role' => User::IS_ADMIN,
            'name' => 'dummy_admin',
            'email' => 'admin@ledger.com',
            'password' => bcrypt('9j^ru7&9VhR5') // TODO not secure
        ]);

        // dummy_manager
        \App\Models\User::factory()->create([
            'role' => User::IS_MANAGER,
            'name' => 'dummy_manager',
            'email' => 'manager@ledger.com',
            'password' => bcrypt('*nvKt2U326Er') // TODO not secure
        ]);

        // dummy_editor
        \App\Models\User::factory()->create([
            'role' => User::IS_EDITOR,
            'name' => 'dummy_editor',
            'email' => 'editor@ledger.com',
            'password' => bcrypt('1qK!Nsc975WQ') // TODO not secure
        ]);
    }
}
