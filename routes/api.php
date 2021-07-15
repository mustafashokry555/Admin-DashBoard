<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DrugController;
use App\Http\Controllers\Api\VerificationController;
use App\Http\Controllers\Api\PharmController;
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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/


Route::group(['middleware'=>['auth:sanctum']], function(){
    Route::post('logout', [AuthController::class, 'logout']);
});
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::post('updateUserInfo/{user_id}', [AuthController::class, 'updateUserInfo']);

Route::post('/email/resend/{id}', [VerificationController::class,'resend'])->name('verification.resend');
Route::get('/email/verify/{id}', [VerificationController::class, 'verify'])->name('verification.verify');

Route::post('pharmadd/{id}', [PharmController::class, 'addPharms']);
Route::post('allDrugs/{id}', [PharmController::class, 'allDrugs']);
Route::post('allPharmDrugs/{id}', [PharmController::class, 'allPharmDrugs']);
Route::post('getLoc/{id}', [PharmController::class, 'getLoc']);
Route::post('getAllLoc/{id}', [PharmController::class, 'getAllLoc']);
Route::post('addDrug/{user_id}/{drug_id}', [PharmController::class, 'addDrug']);
Route::post('deleteDrug/{user_id}/{drug_id}', [PharmController::class, 'deleteDrug']);




Route::post('drugs', [DrugController::class, 'search']);
Route::get('drug/{id}', [DrugController::class, 'drug']);
Route::get('similer/{id}', [DrugController::class, 'similer']);
Route::post('drugs/user/{user_id}', [DrugController::class, 'search_user']);
Route::get('drug/user/{user_id}/{drug_id}', [DrugController::class, 'drug_user']);
Route::get('similer/user/{user_id}/{drug_id}', [DrugController::class, 'similer_user']);
Route::get('comp/{id}', [DrugController::class, 'comp']);



/*comp
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
});



Route::get('/verified-middleware-example', function () {
    return response()->json([
        'message' => 'the email account is already confirmed now you are able to see this message...',
    ]);
 })->middleware(AuthKi::getMiddleware(), 'verified');*/