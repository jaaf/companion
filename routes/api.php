<?php

use Illuminate\Http\Request;
use App\Models\UserPreferences;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LangCookieController;
use App\Http\Controllers\FermentableController;
use App\Http\Controllers\UserPreferenceController;
use App\Http\Controllers\FermentableBothController;
use App\Http\Controllers\FermentableBrandController;
use App\Http\Controllers\InventoryFermentableController;

//last tuto

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


Route::post('/sanctum/token', TokenController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });


    Route::delete('/logout', [AuthController::class, 'logout']);
    Route::post('/fermentableBoth',[FermentableBothController::class,'store']);
    Route::put('/fermentableBoth/{fermentable}',[FermentableBothController::class,'update']);
    Route::resource('inventoryFermentable', InventoryFermentableController::class);
    Route::resource('fermentable', FermentableController::class);
    Route::resource('fermentableBrand', FermentableBrandController::class);
    Route::resource('userPreference',UserPreferenceController::class);
});




Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/request-password', [AuthController::class, 'requestPassword']);
Route::post('/resetpassword', [AuthController::class, 'resetPassword'])->name('resetpassword');
Route::post('/requestpassword', [AuthController::class, 'requestPassword'])->name('requestpassword');


Route::post('/setLanguage',[LangCookieController::class,'setCookie']);
Route::get('/getLanguage',[LangCookieController::class,'getCookie']);


//Route::resource('fermentableBrand', FermentableBrandController::class);

Route::get('/send-email', [MailController::class, 'send']);


