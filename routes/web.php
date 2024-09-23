<?php

use App\Http\Controllers\CampaignController;
use App\Http\Controllers\CampaignElementoController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\TempTableController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('/dashboard', function () {
        // dd(User::with('roles')->find('2'));
        // dd(Auth::user()->hasRole('Cliente'));
        // dd(Auth::user()->hasRole('Cliente'));
        if (Auth::user()->hasRole('Admin')) {$u=User::all(); dd($u); return view('dashboard');}
        elseif (Auth::user()->hasRole('Gestion'))  dd('analizar');
        elseif (Auth::user()->hasRole('Cliente'))return redirect()->route('campaign.index');
        elseif (Auth::user()->hasRole('Comercial')) dd('analizar');
        elseif (Auth::user()->hasRole('Tienda')) dd('analizar');
        else dd('analizar');
    })->name('dashboard');

    // Campaigns
    Route::middleware('role_or_permission:campaign.index')->group(function () {
        Route::get('/campaign', [CampaignController::class, 'index'])->name('campaign.index');
        Route::get('/campaign/{campaign}/cabecera', [CampaignController::class, 'cabecera'])->name('campaign.cabecera');
        Route::get('/campaign/{campaign}/edit', [CampaignController::class, 'edit'])->name('campaign.edit');
        Route::get('/campaign/{campaign}/datos', [CampaignController::class, 'datos'])->name('campaign.datos');
        Route::get('/campaign/{campaign}/stores', [CampaignController::class, 'stores'])->name('campaign.stores');
        Route::get('/campaign/{campaign}/elementos', [CampaignController::class, 'elementos'])->name('campaign.elementos');
        Route::get('/campaign/{campaign}/store/elementos', [CampaignController::class, 'storeselementos'])->name('campaign.storeelementos');
        Route::get('/campaign/{campaign}/elementos/q', [CampaignController::class, 'elementosQ'])->name('campaign.elementosQ');
        Route::get('/campaign/{campaign}/etiquetaspdf', [CampaignController::class, 'etiquetaspdf'])->name('campaign.etiquetaspdf');
    });
    Route::middleware('role_or_permission:campaign.create')->group(function () {
        Route::get('/campaign/create', [CampaignController::class, 'create'])->name('campaign.create');
    });

    Route::middleware('role_or_permission:campaign.edit')->group(function () {
        Route::get('/campaignelemento/{campaignElemento}/edit', [CampaignElementoController::class, 'edit'])->name('campaignelemento.edit');
    });

    // Import
    Route::middleware('role_or_permission:import.index')->group(function () {
        Route::get('/import/{campaign}', [ImportController::class, 'index'])->name('import.index');
    });
    Route::middleware('role_or_permission:campaign.create')->group(function () {
        Route::post('/import/{campaign}', [ImportController::class, 'import'])->name('import.import');
        Route::post('/import/{campaign}/stores', [ImportController::class, 'stores'])->name('import.stores');
        Route::post('/import/{campaign}/elementos', [ImportController::class, 'elementos'])->name('import.elementos');

    });

});
