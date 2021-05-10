<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\FoodGroupController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\UserProgressController;
use App\Http\Controllers\WaterProgressController;
use App\Http\Controllers\AuthController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('login', [AuthController::class, 'login']);
Route::resource('users', UserController::class);

Route::group(['middleware' => ['api']], function () {
    Route::resource('foods', FoodController::class);
    Route::resource('food-groups', FoodGroupController::class);
    Route::resource('goals', GoalController::class);
    Route::resource('meals', MealController::class);
    Route::resource('user-progress', UserProgressController::class);
    Route::resource('water-progress', WaterProgressController::class);
    Route::delete('logout', 'AuthController@logout');
});
