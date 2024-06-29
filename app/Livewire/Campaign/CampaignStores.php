<?php

namespace App\Livewire\Campaign;

use App\Models\Campaign;
use App\Models\CampaignStore;
use Livewire\Component;

class CampaignStores extends Component
{

    public $search='';
    public $campaign;

    function mount(Campaign $campaign){
        $this->campaign=$campaign;
    }

    public function render(){

        $stores=CampaignStore::query()
        ->when($this->search!='',function($query) {return $query->where('store','LIKE','%'.$this->search.'%');})
        ->where('campaign_id',$this->campaign->id)
        ->get();

        return view('livewire.campaign.campaign-stores', compact('stores'));
    }
}
