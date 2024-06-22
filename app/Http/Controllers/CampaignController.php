<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Http\Requests\StoreCampaignRequest;
use App\Http\Requests\UpdateCampaignRequest;
use Illuminate\Support\Facades\Auth;


class CampaignController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('can:campaign.index')->only('index');
    //     $this->middleware('can:campaign.edit')->only('edit','update');
    // }

    // public static function middleware(): array{
    //     return [
    //         // examples with aliases, pipe-separated names, guards, etc:
    //         // 'role_or_permission:manager|edit articles',
    //         new Middleware('role:author', only: ['index']),
    //         new Middleware(\Spatie\Permission\Middleware\RoleMiddleware::using('manager'), except:['show']),
    //         new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('delete records,api'), only:['destroy']),
    //     ];
    // }



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('campaign.index');
        // @if(auth()->user()->hasRole('writer'))
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('campaign.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCampaignRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Campaign $campaign)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Campaign $campaign){
        return view('campaign.edit',compact('campaign'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCampaignRequest $request, Campaign $campaign)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Campaign $campaign)
    {
        //
    }
}
