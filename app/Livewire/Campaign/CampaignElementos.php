<?php

namespace App\Livewire\Campaign;

use App\Models\CampaignElemento;
use App\Models\Campaign;
use App\Models\CampaignCabecera;
use Livewire\Component;
use Livewire\WithPagination;

class CampaignElementos extends Component
{
    use WithPagination;

    public $search='';
    public $campaign;

    function mount(Campaign $campaign){
        $this->campaign=$campaign;
    }

    public function render(){
        $cabecera=CampaignCabecera::where('campaign_id',$this->campaign->id)->first();
        $elementos=CampaignElemento::query()
        // ->when($this->search!='',function($query) {return $query->where('store','LIKE','%'.$this->search.'%');})
        ->where('campaign_id',$this->campaign->id)
        ->paginate(15);
        // ->get();

        return view('livewire.campaign.campaign-elementos', compact('elementos','cabecera'));
    }

}
