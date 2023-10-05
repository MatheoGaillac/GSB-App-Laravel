<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/addHF/{id_frais}', function ($id_frais){
    return view('vues/formHorsForfait', compact("id_frais"));
});

Route::get('/getLogin', [\App\Http\Controllers\VisiteurController::class, 'getLogin']);
Route::post('/login', [\App\Http\Controllers\VisiteurController::class, 'signIn']);
Route::get('/getLogout', [\App\Http\Controllers\VisiteurController::class, 'signOut']);
Route::get('/getListeFrais', [\App\Http\Controllers\FraisController::class, 'getFraisVisiteur']);
Route::get('/modifierFrais/{id}', [\App\Http\Controllers\FraisController::class, 'updateFrais']);
Route::post('/validerFrais', [\App\Http\Controllers\FraisController::class, 'validateFrais']);
Route::get('/ajouterFrais', [\App\Http\Controllers\FraisController::class, 'addFrais']);
Route::get('/supprimerFrais/{id_frais}', [\App\Http\Controllers\FraisController::class, 'supprimeFrais']);
Route::get('/getHF/{id_frais}', [\App\Http\Controllers\HorsForfaitController::class, 'getFraisHF']);
Route::post('/postHF', [\App\Http\Controllers\HorsForfaitController::class, 'postAjouterHFFrais']);
