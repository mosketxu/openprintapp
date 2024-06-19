<?php

use App\Http\Controllers\CampaignController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('/dashboard', function () {
        if (Auth::user()->hasRole('Admin')) {
            return view('dashboard');
            // return redirect()->route('dashboard');
        } elseif (Auth::user()->hasRole('Gestion')) {
            dd('analizar');
            // return redirect()->route('dashboard');
        } elseif (Auth::user()->hasRole('Comercial')) {
            // return redirect()->route('dashboard');
            dd('analizar');
        } elseif (Auth::user()->hasRole('Cliente')) {
            dd('analizar');
        } else {
            dd('analizar');
            // return redirect()->route('producto.index');
        }
        // return view('dashboard');
    })->name('dashboard');

    Route::resource('campaign', CampaignController::class)->names('campaign'); //cuando es resource para aplicar seguridad can hay que hacerlo en el controller
});
