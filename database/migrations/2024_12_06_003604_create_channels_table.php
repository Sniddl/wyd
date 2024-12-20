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
        Schema::create('channels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guild_id')
                ->constrained('guilds', 'id')
                ->cascadeOnDelete();
            $table->foreignId('channel_id')
                ->nullable()
                ->constrained('channels', 'id')
                ->cascadeOnDelete();
            $table->string('name');
            $table->string('identifier');
            $table->string('type')->default('channel');
            $table->integer('order')->default(0);
            $table->unique(['identifier', 'guild_id', 'channel_id'], 'unique_channel');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('channels');
    }
};
