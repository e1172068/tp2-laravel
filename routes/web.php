<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\VilleController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DocumentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", [EtudiantController::class, "index"])->name("home")->middleware("auth");
Route::get("/lang/{locale}", [LocalizationController::class, "index"])->name("lang");


Route::get("/etudiants", [EtudiantController::class, "index"])->name("etudiant.index")->middleware("auth");
Route::get("/etudiants/show/{etudiant}", [EtudiantController::class, "show"])->name("etudiant.show")->middleware("auth");


Route::get("/login", [AuthController::class, "index"])->name("login");
Route::post("/login", [AuthController::class, "authentication"])->name("login.authentication");
Route::get("/registration", [AuthController::class, "create"])->name("user.registration");
Route::post("/registration", [AuthController::class, "store"])->name("user.store");
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard', [AuthController::class, 'show'])->name('dashboard');
Route::get("/dashboard-edit", [AuthController::class, "edit"])->name("auth.edit")->middleware("auth");
Route::put("/dashboard-update", [AuthController::class, "update"])->name("auth.update")->middleware("auth");
Route::get("/dashboard-destroy", [AuthController::class, "destroy"])->name("auth.destroy")->middleware("auth");


Route::get("/forum", [ArticleController::class, "index"])->name("article.index")->middleware("auth");
Route::get('/forum/{article}', [ArticleController::class, 'show'])->name("article.show")->middleware("auth");
Route::get('/forum-create', [ArticleController::class, 'create'])->name("article.create")->middleware("auth");
Route::post('/forum-create', [ArticleController::class, 'store'])->name("article.create")->middleware("auth");
Route::get('/forum-edit/{article}', [ArticleController::class, 'edit'])->name("article.edit")->middleware("auth");
Route::put('/forum-edit/{article}', [ArticleController::class, 'update'])->name("article.update")->middleware("auth");
Route::delete('/forum-edit/{article}', [ArticleController::class, 'destroy'])->name("article.destroy")->middleware("auth");


Route::get("/document", [DocumentController::class, "index"])->name("document.index");
Route::get("/document-create", [DocumentController::class, "create"])->name("document.create");
Route::post("/document-create", [DocumentController::class, "store"])->name("document.create");
Route::get('/document-edit/{document}', [DocumentController::class, 'edit'])->name("document.edit")->middleware("auth");
Route::put('/document-edit/{document}', [DocumentController::class, 'update'])->name("document.update")->middleware("auth");
Route::delete('/document-edit/{document}', [DocumentController::class, 'destroy'])->name("document.destroy")->middleware("auth");




