<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Inserta un usuario de prueba
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Inserta registros en la tabla 'platos'
        DB::table('platos')->insert([
            ['nombre' => 'Pizza Margarita', 'precio' => 20000],
            ['nombre' => 'Hamburguesa Clásica', 'precio' => 18000],
            ['nombre' => 'Ensalada César', 'precio' => 15000],
        ]);
    }
}
