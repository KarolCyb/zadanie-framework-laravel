<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeopleController;

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

Route::middleware('auth:sanctum')->get('/people', function (Request $request) {
    return $request->people();
});


Route::get('Cybinski/310499/people/read', [PeopleController::class, 'index']);
Route::post('Cybinski/310499/people/create', [PeopleController::class, 'create']);
Route::get('Cybinski/310499/people/read/{id}', [PeopleController::class, 'read']);
Route::put('Cybinski/310499/people/update/{id}', [PeopleController::class, 'update']);
Route::delete('Cybinski/310499/people/delete/{id}', [PeopleController::class, 'destroy']);
