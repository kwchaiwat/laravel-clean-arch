<?php

use App\Http\Controllers\BankController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/**
 * php artisan tinker
 * $u = new \App\User
 * $u->name = 'Admin'
 * $u->email = 'admin@example.com'
 * $u->password = bcrypt('123456')
 * $u->save()
 *
 */

Route::get('login', function (){
    abort(401);
})->name('login');

Route::prefix('v1')->name('v1')->group(function () {

    Route::post('login', [UserController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/banks', [BankController::class, 'getAllBanks']);
        Route::get('/banks/{id}', [BankController::class, 'getBank']);
    });

});

