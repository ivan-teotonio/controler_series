<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;

Route::get('/', function () {
    return redirect()->route('series.index');
});


// Route::get('/series', [SeriesController::class, 'index'])->name('series.index');

// Route::get('/series/create', [SeriesController::class, 'create'])->name('series.create');

// Route::post('/series', [SeriesController::class, 'store'])->name('series.store');

//resources
Route::resource('/series', SeriesController::class)->only(['index', 'create', 'store', 'destroy']);

//rota delete
//Route::delete('/series/{serie}', [SeriesController::class, 'destroy'])->name('series.destroy');