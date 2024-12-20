<?php

namespace Database\Seeders;

use App\Models\Channel;
use App\Models\Guild;
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

        $peter = User::factory()->create([
            'name' => 'Peter Hill',
            'email' => 'peter@example.com',
            'username' => 'PHIll',
            'password' => Hash::make('password'),
        ]);

        User::factory(10, [
            'password' => Hash::make('password')
        ])->create();

        $jinx->posts()->create([
            'content' => "Never tell anyone your password! ... Mine's password"
        ]);

        $jinx->posts()->create([
            'content' => "Jinx? Stands for Jinx! Durr."
        ]);

        $jinx->posts()->create([
            'content' => "Hold on! I'm about to say something really cool!"
        ]);

        $rl = Guild::factory()->for($jinx, 'owner')->create([
            'name' => 'Rocket League',
            'identifier' => 'rocketleague'
        ]);

        $lol = Guild::factory()->for($jinx, 'owner')->create([
            'name' => 'League of Legends',
            'identifier' => 'leagueoflegends'
        ]);

        $cod = Guild::factory()->for($jinx, 'owner')->create([
            'name' => 'Call of Duty',
            'identifier' => 'callofduty'
        ]);

        $skyblock = Guild::factory()->for($jinx, 'owner')->create([
            'name' => 'SkyBlock',
            'identifier' => 'skyblock'
        ]);

        Channel::factory()->for($rl)->create([
            'name' => 'Rumble',
            'identifier' => 'rumble'
        ]);

        Channel::factory()->for($rl)->create([
            'name' => 'Competitive',
            'identifier' => 'competitive'
        ]);

        Channel::factory()->for($rl)->create([
            'name' => 'Casual',
            'identifier' => 'casual'
        ]);

        $support = Channel::factory()->for($skyblock)->create([
            'name' => 'Support',
            'identifier' => 'support',
            'type' => 'category',
        ]);

        Channel::factory()->for($skyblock)->for($support)->create([
            'name' => 'General',
            'identifier' => 'general'
        ]);
    }
}
