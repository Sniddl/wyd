<?php

use App\Models\InviteCode;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $user = User::create([
            'username' => config('app.admin.username'),
            'name' => config('app.admin.name'),
            'email' => config('app.admin.email'),
            'password' => Hash::make(config('app.admin.password')),
        ]);
        $code = Str::upper('WYD-' . Str::random(4) . '-' . Str::random(5));
        $user->inviteCodes()->create([
            'code' => $code,
            'user_id' => 1,
        ]);
        dump($code);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {}
};
