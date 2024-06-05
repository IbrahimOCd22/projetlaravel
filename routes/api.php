<?php

use App\Http\Controllers\API\CandidatController;
use App\Http\Controllers\API\CvController;
use App\Http\Controllers\API\DemendeController;
use App\Http\Controllers\API\education_detailController;
use App\Http\Controllers\API\EmployerController;
use App\Http\Controllers\API\ExpertiseController;
use App\Http\Controllers\API\LanguageController;
use App\Http\Controllers\API\OffreController;
use App\Http\Controllers\API\work_experienceController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource("Offre", OffreController::class);
Route::apiResource("Employer", EmployerController::class);
Route::apiResource("CV", CvController::class);
Route::apiResource("Demende", DemendeController::class);
Route::apiResource("candidat", CandidatController::class);
Route::apiResource("education", education_detailController::class);
Route::apiResource("Expertise", ExpertiseController::class);
Route::apiResource("Language", LanguageController::class);
Route::apiResource("work", work_experienceController::class);


Route::post('login/candidate', [CandidatController::class, 'login']);
Route::post('login/employer', [EmployerController::class, 'login']);