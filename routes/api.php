<?php

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

// api/v1
Route::group(
    [
        'prefix' => 'v1',
        'namespace' => 'App\Http\Controllers\Api\V1',
    ],
    function () {
        Route::apiResources([
            'tasks' => TaskController::class,
        ]);
    }
);
