<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Auth\Register;
use App\Livewire\Bookmarks\Index as Bookmarks;
use App\Livewire\Explore\Index as Explore;
use App\Livewire\Guild\Index as Guilds;
use App\Livewire\Notifications\Index as Notifications;
use App\Livewire\Premium\Index as Premium;
use App\Livewire\Profile\Index as Profile;
use App\Livewire\Settings\Index as Settings;
use App\Livewire\Welcome;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get("/", Welcome::class)->name('home');
Route::get("/guilds", Guilds::class);
Route::get("/explore", Explore::class);
Route::get("/notifications", Notifications::class);
Route::get("/premium", Premium::class);
Route::get("/bookmarks", Bookmarks::class);
Route::get("/me", Profile::class);
Route::get("/settings", Settings::class);

Route::get("/dashboard", function () {
    return Inertia::render("Dashboard");
})
    ->middleware(["auth", "verified"])
    ->name("dashboard");

Route::middleware("auth")->group(function () {
    Route::get("/profile", [ProfileController::class, "edit"])->name(
        "profile.edit"
    );
    Route::patch("/profile", [ProfileController::class, "update"])->name(
        "profile.update"
    );
    Route::delete("/profile", [ProfileController::class, "destroy"])->name(
        "profile.destroy"
    );
});

Route::middleware('guest')->group(function () {
    Route::get('/register', Welcome::class)
        ->name('register')
        ->middleware(['signed', 'modal:auth.register']);
    Route::get('/login', Welcome::class)
        ->name('login')
        ->middleware(['modal:auth.login']);
});
// require __DIR__ . "/auth.php";
