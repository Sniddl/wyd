<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DevelopmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jinx = User::factory()->create([
            'name' => 'Powder',
            'email' => 'jinx@example.com',
            'username' => 'jinx_lol',
            'password' => Hash::make('password'),
        ]);

        User::factory(10, [
            'password' => Hash::make('password')
        ])->create();

        $jinx->posts()->create([
            'bait' => "Never tell anyone your password! ... It's password"
        ]);

        $jinx->posts()->create([
            'bait' => "Jinx? Stands for Jinx! Durr."
        ]);

        $jinx->posts()->create([
            'bait' => "Hold on! I'm about to say something really cool!"
        ]);
    }
}
