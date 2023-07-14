<?php

use  \Dcs\Recette\Http\Controllers\RctActiviteController;
use Dcs\Recette\Http\Controllers\RctContribuableController;
use Dcs\Recette\Http\Controllers\RctForchetController;
use Dcs\Recette\Http\Controllers\RctCategorieActivteController;
use Dcs\Recette\Http\Controllers\CarteController;
use \Dcs\Recette\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'recette/',
    'namespace' => 'Dcs\Recete\Http\Controllers',
    'middleware'=>['web', 'auth']], function () {
        Route::get('', [TestController::class, 'index']);
});
Route::group(['prefix' => 'activites/' ,'middleware' => ['web', 'auth']], function () {
    Route::get('', [RctActiviteController::class,'index']);
    Route::get('getDT', [RctActiviteController::class,'getDT']);
    Route::get('getDT/{id}', [RctActiviteController::class,'getDt']);
    Route::get('get/{id}',[RctActiviteController::class,'get']);
    Route::get('getTab/{id}/{tab}',[RctActiviteController::class,'getTab']);
    Route::get('add', [RctActiviteController::class,'formAdd']);
    Route::post('add', [RctActiviteController::class,'add']);
    Route::post('edit',[RctActiviteController::class,'edit']);
    Route::get('delete/{id}',[RctActiviteController::class,'delete']);
});

Route::group(['prefix' => 'categories/', 'middleware' => ['web', 'auth']], function () {
    Route::get('', [RctCategorieActivteController::class,'index']);
    Route::get('getDT', [RctCategorieActivteController::class,'getDT']);
    Route::get('getDT/{id}', [RctCategorieActivteController::class ,'getDT']);
    Route::get('get/{id}',[RctCategorieActivteController::class ,'get']);
    Route::get('getTab/{id}/{tab}',[RctCategorieActivteController::class ,'getTab']);
    Route::get('add',[RctCategorieActivteController::class ,'formAdd']);
    Route::post('add',[RctCategorieActivteController::class ,'add']);
    Route::post('edit',[RctCategorieActivteController::class ,'edit']);
    Route::get('delete/{id}',[RctCategorieActivteController::class ,'delete']);
});

Route::group(['prefix' => 'forchets/','middleware' => ['web', 'auth'] ], function () {
    Route::get('', [RctForchetController::class,'index']);
    Route::get('getDT', [RctForchetController::class,'getDT']);
    Route::get('getDT/{id}', [RctForchetController::class,'getDT']);
    Route::get('get/{id}',[RctForchetController::class,'get']);
    Route::get('getTab/{id}/{tab}',[RctForchetController::class,'getTab']);
    Route::get('add',[RctForchetController::class,'formAdd']);
    Route::post('add',[RctForchetController::class,'add']);
    Route::post('edit',[RctForchetController::class,'edit']);
    Route::get('delete/{id}',[RctForchetController::class,'delete']);
    Route::get('getCategorie/{id}',[RctForchetController::class,'getCategorie']);
});

Route::group(['prefix' => 'contribuables/' , 'middleware' => ['web', 'auth']], function () {
    Route::get('', [RctContribuableController::class,'index']);
     Route::get('getDT', [RctContribuableController::class,'getDT']);

    Route::get('getDT/{id}', [RctContribuableController::class,'getDT']);
    Route::get('get/{id}',[RctContribuableController::class,'get']);
    Route::get('getTab/{id}/{tab}',[RctContribuableController::class,'getTab']);
    Route::get('add',[RctContribuableController::class,'formAdd']);
    Route::post('add',[RctContribuableController::class,'add']);
    Route::post('edit',[RctContribuableController::class,'edit']);
    Route::get('delete/{id}',[RctContribuableController::class,'delete']);
    Route::get('getActvite/{activite}/{emplacement}/{taille}',[RctContribuableController::class,'getActvite']);
  Route::get('exportcontribuablePDF/{id}',[RctContribuableController::class,'exportcontribuablePDF']);
    Route::get('getPayements/{id}',[RctContribuableController::class,'getPayements']);
  Route::get('suiviContibuable/{annee}',[RctContribuableController::class,'suiviContibuable']);
    Route::get('suspension/{id}',[RctContribuableController::class,'suspension']);
    Route::get('playsup/{id}',[RctContribuableController::class,'playsup']);
    Route::get('changeAnnee/{annee}',[RctContribuableController::class,'changeAnnee']);
    Route::get('annulerPayement/{id}',[RctContribuableController::class,'annulerPayement']);
    Route::get('reprendrePayement/{id_mois}/{id_pay}',[RctContribuableController::class,'reprendrePayement']);
    Route::get('suspendrePayement/{id_mois}/{id_pay}',[RctContribuableController::class,'suspendrePayement']);
    Route::get('getPayementAnnne/{annee}',[RctContribuableController::class,'getPayementAnnne']);
    Route::get('getPayementAnnne/{annee}/{contr}/{date1}/{date2}',[RctContribuableController::class,'getPayementAnnne']);
    Route::get('pdfSuiviPayementCtb/{annee}/{contr}/{date1}/{date2}',[RctContribuableController::class,'pdfSuiviPayementCtb']);
    Route::get('excelSuiviPayementCtb/{annee}/{contr}/{date1}/{date2}',[RctContribuableController::class,'excelSuiviPayementCtb']);
    Route::get('newPayement/{id}',[RctContribuableController::class,'newPayement']);
    Route::get('getPayements/{id}/{selected}',[RctContribuableController::class,'getPayements']);
    Route::post('savePayement',[RctContribuableController::class,'savePayement']);
    Route::post('saveSuspension',[RctContribuableController::class,'saveSuspension']);
});
Route::group(['prefix' => 'cartes/','middleware' => ['web', 'auth'] ],function (){
    Route::get('', [CarteController::class, 'index']);
   // Route::get('filter/{localite}/{quartier}/{logement}', [CarteController::class, 'filter']);
});

