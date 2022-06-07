<?php

use App\Http\Controllers\API\SurveyController;
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

Route::get('survey', [SurveyController::class, 'index']);
Route::post('survey/store', [SurveyController::class, 'store']);
Route::get('survey/show/{id}', [SurveyController::class, 'show']);
Route::post('survey/update/{id}', [SurveyController::class, 'update']);
Route::get('survey/destroy/{id}', [SurveyController::class, 'destroy']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
