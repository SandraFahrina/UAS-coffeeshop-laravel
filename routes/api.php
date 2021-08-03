<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CoshopsController;
use App\Http\Controllers\Api\DataController;
use App\Http\Controllers\Api\TransController;
use App\Http\Controllers\Api\GroupsController;
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
Route::get('', [coshopsController::class, 'index']);
Route::resources([
    'coshops' => coshopsController::class,
    'data' => DataController::class,
    'trans' => TransController::class,
    'groups' => GroupsController::class,
]);

