<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('guild_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guild_id')
                ->constrained('guilds', 'id')
                ->cascadeOnDelete();
            $table->foreignId('user_id')
                ->constrained('users', 'id')
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guild_user');
    }
};
