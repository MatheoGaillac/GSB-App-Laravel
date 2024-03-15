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
})->name('home');

Route::post('postModifierHorsForfait/{id}',
    array(
        'uses' => 'App\Http\Controllers\HorsForfaitController@postmodificationhorsforfait',
        'as' => 'postmodifierFraisHorsForfait',
    )
);

Route::get('/getLogin', [\App\Http\Controllers\VisiteurController::class, 'getLogin']);
Route::post('/login', [\App\Http\Controllers\VisiteurController::class, 'signIn']);
Route::get('/getLogout', [\App\Http\Controllers\VisiteurController::class, 'signOut']);

Route::get('/getListeFrais', [\App\Http\Controllers\FraisController::class, 'getFraisVisiteur']);
Route::get('/modifierFrais/{id}', [\App\Http\Controllers\FraisController::class, 'updateFrais']);
Route::post('/validerFrais', [\App\Http\Controllers\FraisController::class, 'validateFrais']);
Route::get('/ajouterFrais', [\App\Http\Controllers\FraisController::class, 'addFrais']);
Route::get('/supprimerFrais/{id_frais}', [\App\Http\Controllers\FraisController::class, 'supprimeFrais']);

Route::get('/getFraisHorsForfait/{id_frais}', [\App\Http\Controllers\HorsForfaitController::class, 'getListFraisHorsForfait'])->name('getFraisHorsForfait');
Route::get('/addFraisHorsForfait/{id_frais}', [\App\Http\Controllers\HorsForfaitController::class, 'addFraisHorsForfait']);
Route::post('/postHorsForfait', [\App\Http\Controllers\HorsForfaitController::class, 'postAjouterFraisHorsForfait']);
Route::get('/modifierFraisHorsForfait/{id_fraishorsforfait}', [\App\Http\Controllers\HorsForfaitController::class, 'modifierFraisHorsForfait']);
Route::get('/supprimerFraisHorsForfait/{id_fraishorsforfait}', [\App\Http\Controllers\HorsForfaitController::class, 'supprimeFraisHorsForfait']);

