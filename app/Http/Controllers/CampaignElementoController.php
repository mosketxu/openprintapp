<?php

namespace App\Http\Controllers;

use App\Models\CampaignElemento;

class CampaignElementoController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CampaignElemento $campaignElemento)
    {
        return view('campaignelemento.edit',compact('campaignElemento'));
    }

}
