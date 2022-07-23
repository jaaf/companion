<?php

use Illuminate\Http\Request;
use App\Models\UserPreferences;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HopController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrewController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\MiscController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\YeastController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\HopBothController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\LangCookieController;
use App\Http\Controllers\FermentableController;
use App\Http\Controllers\InventoryHopController;
use App\Http\Controllers\InventoryMiscController;
use App\Http\Controllers\InventoryYeastController;
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

    Route::get('inventoryFermentable/clear',[InventoryFermentableController::class,'clear']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/fermentableBoth',[FermentableBothController::class,'store']);
    Route::put('/fermentableBoth/{fermentable}',[FermentableBothController::class,'update']);
    Route::resource('inventoryFermentable', InventoryFermentableController::class);
    
    
    Route::resource('userPreference',UserPreferenceController::class);
    Route::post('/hopBoth',[HopBothController::class,'store']);
    Route::put('/hopBoth/{hop}',[HopBothController::class,'update']);
   
    Route::resource('inventoryHop',InventoryHopController::class);  
    Route::resource('inventoryYeast',InventoryYeastController::class); 
    Route::resource('inventoryMisc',InventoryMiscController::class); 
     Route::resource('equipment',EquipmentController::class);
     Route::resource('recipe',RecipeController::class);
      Route::resource('brew',BrewController::class);
     
});




Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/request-password', [AuthController::class, 'requestPassword']);
Route::post('/resetpassword', [AuthController::class, 'resetPassword'])->name('resetpassword');
Route::post('/requestpassword', [AuthController::class, 'requestPassword'])->name('requestpassword');
Route::resource('fermentableBrand', FermentableBrandController::class);
Route::resource('fermentable', FermentableController::class);
 Route::resource('hop',HopController::class);
 Route::resource('yeast',YeastController::class); 
 Route::resource('misc',MiscController::class);
Route::post('/setLanguage',[LangCookieController::class,'setCookie']);
Route::get('/getLanguage',[LangCookieController::class,'getCookie']);


//Route::resource('fermentableBrand', FermentableBrandController::class);

Route::get('/send-email', [MailController::class, 'send']);


