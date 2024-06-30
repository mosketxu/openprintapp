<?php

namespace App\Livewire\Campaign;

use App\Models\Campaign;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CampaignElementosQ extends Component
{

    public $campaign;

    function mount(Campaign $campaign){
        $this->campaign=$campaign;
    }

    public function render(){
        $elementos = DB::table('campaign_store_elementos')
        ->select(
            'campaign_elementos.imagen',
            'campaign_elementos.campo1',
            'campaign_elementos.campo2',
            'campaign_elementos.campo3',
            'campaign_elementos.campo4',
            'campaign_elementos.campo5',
            'campaign_elementos.categoria',
            'campaign_elementos.archivo',
            'campaign_elementos.material',
            'campaign_elementos.medida',
            'campaign_elementos.idioma',
            'campaign_elementos.elementificador',
            DB::raw('SUM(campaign_store_elementos.cantidad) as total'))
        ->join('campaign_elementos', 'campaign_store_elementos.campaign_elemento_id', '=', 'campaign_elementos.id')
        ->where('campaign_store_elementos.campaign_id', $this->campaign->id)
        ->groupBy(
            'campaign_elementos.imagen',
            'campaign_elementos.campo1',
            'campaign_elementos.campo2',
            'campaign_elementos.campo3',
            'campaign_elementos.campo4',
            'campaign_elementos.campo5',
            'campaign_elementos.categoria',
            'campaign_elementos.archivo',
            'campaign_elementos.material',
            'campaign_elementos.medida',
            'campaign_elementos.idioma',
            'campaign_elementos.elementificador',
            )
        ->get();
        return view('livewire.campaign.campaign-elementos-q',compact('elementos'));
    }


}
