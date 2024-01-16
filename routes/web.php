<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Show all the posts
Route::get("/", [PostController::class, "index"]);

// Show the create page
Route::get("/posts/create", [PostController::class, "create"])->middleware("auth");

// Store a new post
Route::post("/posts", [PostController::class, "store"])->middleware("auth");

// Show the edit page fot editing the post
Route::get("/posts/{post}/edit", [PostController::class, "edit"])->middleware("auth");

// Show My Posts
Route::get("/posts/myposts",[PostController::class,"ShowMyPosts"]);
// Update the post
Route::put("/posts/{post}", [PostController::class, "update"])->middleware("auth");

// Delete the post
Route::delete("/posts/{post}", [PostController::class, "delete"])->middleware("auth");

// Show Single Post
Route::get("/posts/{post}", [PostController::class, "show"]);

//Comment On A Single Post
Route::post("/posts/{post}/comment",[CommentController::class,"store"])->middleware("auth");

//Show Register Form
Route::get('/users/register', [UserController::class, "register"])->middleware("guest");

// Register the user
Route::post("/users", [UserController::class, "store"]);

// Log User Out
Route::post('/logout', [UserController::class, "logout"])->middleware("auth");

//Show Login Form
Route::get("/login", [UserController::class, "login"])->name("login")->middleware("guest");

//Login User
Route::post('/users/auth', [UserController::class, "authenticate"]);
