<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //decommentare se si vogliono creare dei fake  modificare le factory con i giusti campi = colonne tabelle db
        //con il comando php artisan db:seed

        // \App\Models\User::factory(10)->create();
        // \App\Models\Article::factory(20)->create();
        // \App\Models\Task::factory(20)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
