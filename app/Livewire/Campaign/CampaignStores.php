<?php

namespace App\Livewire\Campaign;

use App\Models\Campaign;
use App\Models\CampaignStore;
use Livewire\Component;
use Livewire\WithPagination;

class CampaignStores extends Component
{
    use WithPagination;

    public $search='';
    public $campaign;

    function mount(Campaign $campaign){
        $this->campaign=$campaign;
    }

    public function render(){

        $stores=CampaignStore::query()
        ->when($this->search!='',function($query) {return $query->where('store','LIKE','%'.$this->search.'%');})
        ->where('campaign_id',$this->campaign->id)
        ->paginate(15);
        // ->get();

        return view('livewire.campaign.campaign-stores', compact('stores'));
    }
}
