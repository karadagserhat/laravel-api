<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::resource("jobs", JobController::class);

// Public Routes
Route::post("/register", [AuthController::class, "register"]);
Route::post("/login", [AuthController::class, "login"]);
Route::get("/jobs", [JobController::class, "index"]);
Route::get("/jobs/{id}", [JobController::class, "show"]);
Route::get("/jobs/search/{name}", [JobController::class, "search"]);


// Protected Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post("/jobs", [JobController::class, "store"]);
    Route::put("/jobs/{id}", [JobController::class, "update"]);
    Route::delete("/jobs/{id}", [JobController::class, "destroy"]);
    Route::post("/logout", [AuthController::class, "logout"]);
});


