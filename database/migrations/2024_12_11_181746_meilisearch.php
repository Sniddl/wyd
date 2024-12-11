<?php

use App\Models\Guild;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Artisan::call('scout:import', ['model' => Post::class]);
        Artisan::call('scout:import', ['model' => User::class]);
        Artisan::call('scout:import', ['model' => Guild::class]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Artisan::call('scout:flush', ['model' => Post::class]);
        Artisan::call('scout:flush', ['model' => User::class]);
        Artisan::call('scout:flush', ['model' => Guild::class]);
    }
};
