<?php

use App\Http\Controllers\anime\AnimeController;
use App\Http\Controllers\profil\ProfilController;
use App\Http\Controllers\todo\TodoController;
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    return view("welcome");
});

Route::get("/test", function () {
    return view("test");
});

Route::get("/profil", [ProfilController::class, "index"])->name("profil");
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

Route::get("/anime/search", [AnimeController::class, "search"])->name(
    "anime.searchAnime"
);
Route::get("/anime/detail/{id}", [AnimeController::class, "show"])->name(
    "anime.detail"
);

