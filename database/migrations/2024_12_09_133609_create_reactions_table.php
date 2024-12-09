<?php

use App\Models\Reaction;
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
        Schema::create('reactions', function (Blueprint $table) {
            $table->id();
            $table->string('emoji')->charset('utf8mb4')->collation('utf8mb4_bin');
            $table->foreignId('guild_id')
                ->nullable()
                ->constrained('guilds')
                ->cascadeOnDelete();
            $table->foreignId('channel_id')
                ->nullable()
                ->constrained('channels')
                ->cascadeOnDelete();
            $table->unique(['emoji', 'guild_id', 'channel_id'], 'unique_emoji');
            $table->timestamps();
        });

        Reaction::firstOrCreate([
            'emoji' => '❤️'
        ]);
        Reaction::firstOrCreate([
            'emoji' => '🦄'
        ]);
        Reaction::firstOrCreate([
            'emoji' => '🤯'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reactions');
    }
};
