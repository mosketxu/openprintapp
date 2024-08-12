<?php

namespace App\Livewire\Campaign;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CampaignDatos extends Component
{
    public $search='';
    public $campaign;

    function mount(Campaign $campaign){
        $this->campaign=$campaign;
    }

    public function render()
    {

        $datos=DB::table($this->campaign->id)
            // ->when($this->search!='',function($query) {return $query->where('store','LIKE','%'.$this->search.'%');})
            ->get();

        return view('livewire.campaign.campaign-datos',compact('datos'));
    }

}
