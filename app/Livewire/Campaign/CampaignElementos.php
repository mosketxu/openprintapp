<?php

namespace App\Livewire\Campaign;

use App\Models\CampaignElemento;
use App\Models\Campaign;
use Livewire\Component;

class CampaignElementos extends Component
{

    public $search='';
    public $campaign;

    function mount(Campaign $campaign){
        $this->campaign=$campaign;
    }

    public function render(){

        $elementos=CampaignElemento::query()
        // ->when($this->search!='',function($query) {return $query->where('store','LIKE','%'.$this->search.'%');})
        ->where('campaign_id',$this->campaign->id)
        ->get();

        return view('livewire.campaign.campaign-elementos', compact('elementos'));
    }

}
