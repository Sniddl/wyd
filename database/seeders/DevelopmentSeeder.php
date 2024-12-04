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
        User::factory()->create([
            'name' => 'Powder',
            'email' => 'jinx@example.com',
            'username' => 'lol_jinx',
            'password' => Hash::make('password'),
        ]);

        User::factory(10, [
            'password' => Hash::make('password')
        ])->create();
    }
}
