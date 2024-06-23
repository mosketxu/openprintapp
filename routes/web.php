<?php

use App\Http\Controllers\CampaignController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\RoleController;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('/dashboard', function () {
        // dd(User::with('roles')->find('2'));


        // dd(Auth::user()->hasRole('Cliente'));
        // dd(Auth::user()->hasRole('Cliente'));
        if (Auth::user()->hasRole('Admin')) return view('dashboard');
        elseif (Auth::user()->hasRole('Gestion'))  dd('analizar');
        elseif (Auth::user()->hasRole('Cliente'))return redirect()->route('campaign.index');
        elseif (Auth::user()->hasRole('Comercial')) dd('analizar');
        elseif (Auth::user()->hasRole('Tienda')) dd('analizar');
        else dd('analizar');
    })->name('dashboard');

    // Campaigns
    Route::middleware('role_or_permission:campaign.index')->group(function () {
        Route::get('/campaign', [CampaignController::class, 'index'])->name('campaign.index');
        Route::get('/campaign/{campaign}/edit', [CampaignController::class, 'edit'])->name('campaign.edit');
    });
    Route::middleware('role_or_permission:campaign.create')->group(function () {
        Route::get('/campaign/create', [CampaignController::class, 'create'])->name('campaign.create');
    });
});
