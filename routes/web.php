<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Page\Bookmarks;
use App\Livewire\Page\Channel;
use App\Livewire\Page\Explore;
use App\Livewire\Page\Guilds;
use App\Livewire\Page\Home;
use App\Livewire\Page\Notifications;
use App\Livewire\Page\Discussion;
use App\Livewire\Page\Premium;
use App\Livewire\Page\Profile;
use App\Livewire\Page\Settings;
use App\Livewire\Page\Trend;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get("/", Home::class)->name('home');
Route::get('/guilds', Guilds::class);
Route::get("/g/{guild}/{channel?}/{thread?}", Channel::class)->name('thread')
    ->middleware(['channel-check']);
Route::get("/explore", Explore::class)->name('explore');
Route::get("/notifications", Notifications::class)->name('notifications');
Route::get("/premium", Premium::class);
Route::get("/bookmarks", Bookmarks::class);
Route::get("/u/{user}", Profile::class)->name('profile');
Route::get("/settings", Settings::class);
Route::get('/p/{post?}', Discussion::class)->name('post');
Route::get('/t/{hashtag?}', Trend::class)->name('hashtag');

Route::get("/dashboard", function () {
    return Inertia::render("Dashboard");
})
    ->middleware(["auth", "verified"])
    ->name("dashboard");

// Route::middleware("auth")->group(function () {
//     Route::get("/profile", [ProfileController::class, "edit"])->name(
//         "profile.edit"
//     );
//     Route::patch("/profile", [ProfileController::class, "update"])->name(
//         "profile.update"
//     );
//     Route::delete("/profile", [ProfileController::class, "destroy"])->name(
//         "profile.destroy"
//     );
// });

Route::middleware('guest')->group(function () {
    Route::get('/register', Home::class)
        ->name('register')
        ->middleware(['signed', 'modal:page.auth.register']);
    Route::get('/login', Home::class)
        ->name('login')
        ->middleware(['modal:page.auth.login']);
});
// require __DIR__ . "/auth.php";
