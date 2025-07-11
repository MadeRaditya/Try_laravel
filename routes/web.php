<?php

use App\Http\Controllers\anime\AnimeController;
use App\Http\Controllers\profil\ProfilController;
use App\Http\Controllers\todo\TodoController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    return view("welcome");
});

Route::get("/login", [AuthController::class, "showLogin"])->name("login");
Route::post("/login", [AuthController::class, "login"]);

Route::get("/register", [AuthController::class, "showRegister"])->name(
    "register"
);
Route::post("/register", [AuthController::class, "register"]);

Route::post("/logout", [AuthController::class, "logout"])->name("logout");

Route::get('/forgot-password',[ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password',[ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('/reset-password/{token}',[ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password',[ResetPasswordController::class, 'reset'])->name('password.update');

Route::middleware("auth")->prefix("profile")->name("profile.")->group(function () {
    Route::get("/", [ProfilController::class, "index"])->name("index");
    Route::get("/edit", [ProfilController::class, "edit"])->name(
        "edit"
    );
    Route::post("/", [ProfilController::class, "update"])->name(
        "update"
    );
});

Route::get("/dashboard", function () {
    return view("dashboard");
})->middleware("auth")->name("dashboard");

Route::get("/test", function () {
    return view("test");
});

Route::get("/todo", [TodoController::class, "index"])->name("todo");
Route::post("/todo", [TodoController::class, "store"])->name("todo.post");
Route::put("/todo/{id}", [TodoController::class, "update"])->name(
    "todo.update"
);
Route::delete("/todo/{id}", [TodoController::class, "destroy"])->name(
    "todo.delete"
);
Route::get("/anime", [AnimeController::class, "index"])->name("anime.index");
Route::get("/anime/TopAnime", [AnimeController::class, "topAnime"])->name(
    "anime.topAnime"
);
Route::get("/anime/NewAnime", [AnimeController::class, "newAnime"])->name(
    "anime.newAnime"
);
Route::get("/anime/search", [AnimeController::class, "search"])->name(
    "anime.searchAnime"
);
Route::get("/anime/detail/{id}", [AnimeController::class, "show"])->name(
    "anime.detail"
);
