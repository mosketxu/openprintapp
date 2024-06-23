<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Http\Requests\StoreCampaignRequest;
use App\Http\Requests\UpdateCampaignRequest;


class CampaignController extends Controller
{
    public function index(){
        return view('campaign.index');
    }

    public function create(){
        return view('campaign.create');
    }

    public function edit(Campaign $campaign){
        return view('campaign.edit',compact('campaign'));
    }

}
