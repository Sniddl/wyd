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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users', 'id')
                ->cascadeOnDelete();

            $table->string('identifier')->unique();

            $table->string('slug')->unique();

            $table->foreignId('guild_id')
                ->nullable()
                ->constrained('guilds', 'id')
                ->cascadeOnDelete();

            $table->foreignId('channel_id')
                ->nullable()
                ->constrained('channels', 'id')
                ->cascadeOnDelete();

            $table->foreignId('post_id')
                ->nullable()
                ->constrained('posts', 'id')
                ->cascadeOnDelete();

            $table->string('bait');
            $table->text('enriched_bait')->nullable();
            $table->text('content')->nullable();
            $table->mediumText('enriched_content')->nullable();
            $table->integer('depth')->default(0);
            $table->integer('replyCount')->default(0);
            $table->bigInteger('views')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
