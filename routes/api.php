<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Auth\JWTAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::group([
//     'prefix' => 'auth'
// ], function () {
//     Route::post('login', [JWTAuthController::class, 'login'])->name('jwt.login');
//     Route::post('register', [JWTAuthController::class])->name('jwt.register');
// });

Route::prefix('auth')->group(function () {
    Route::post('login', [JWTAuthController::class, 'login'])->name('jwt.login');
    Route::post('register', [JWTAuthController::class, 'register'])->name('jwt.register');
    Route::post('me', [JWTAuthController::class, 'me'])->name('jwt.me');
    Route::post('logout', [JWTAuthController::class, 'logout'])->name('jwt.logout');
    Route::post('refresh', [JWTAuthController::class, 'refresh'])->name('jwt.refresh');

});

Route::get('todos', [TodoController::class, 'index'])->name('todos.index');
Route::get('todos/{id}', [TodoController::class, 'show'])->name('todos.show');
Route::post('todos', [TodoController::class, 'store'])->name('todos.create');
Route::put('todos/{id}', [TodoController::class, 'update'])->name('todos.update');
Route::delete('todos/{id}', [TodoController::class, 'destroy'])->name('todos.delete');
