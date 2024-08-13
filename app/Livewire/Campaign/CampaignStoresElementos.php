<?php

namespace App\Livewire\Campaign;

use Livewire\Component;
use App\Models\Campaign;
use App\Models\CampaignStore;
use Livewire\WithPagination;

class CampaignStoresElementos extends Component
{
    use WithPagination;

    public $campaign;

    function mount(Campaign $campaign){
        $this->campaign=$campaign;
    }

    public function render(){
        $stores=CampaignStore::query()
            ->with('elementos')
            ->whereHas('elementos')
            ->where('campaign_id',$this->campaign->id)
            ->paginate(7);
            // ->get();
        return view('livewire.campaign.campaign-stores-elementos',compact('stores'));
    }
}
