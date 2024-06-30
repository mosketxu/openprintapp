<?php

namespace App\Livewire\Campaign;

use Livewire\Component;
use App\Models\Campaign;
use App\Models\CampaignStore;

class CampaignStoresElementos extends Component
{

    public $campaign;

    function mount(Campaign $campaign){
        $this->campaign=$campaign;
    }

    public function render(){

    $stores=CampaignStore::with('elementos')->whereHas('elementos')->where('campaign_id',$this->campaign->id)->get();


        return view('livewire.campaign.campaign-stores-elementos',compact('stores'));
    }
}
