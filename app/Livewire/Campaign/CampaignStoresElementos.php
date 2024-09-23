<?php

namespace App\Livewire\Campaign;

use Livewire\Component;
use App\Models\Campaign;
use App\Models\CampaignCabecera;
use App\Models\CampaignStore;
use App\Models\CampaignStoreElemento;
use Livewire\WithPagination;

class CampaignStoresElementos extends Component
{
    use WithPagination;

    public $campaign;
    public $cabecera;

    public $bcampo0;
    public $bcampo1;
    public $bcampo2;
    public $bcampo3;
    public $bcampo4;
    public $bcampo5;
    public $bcampo6;
    public $bcampo7;
    public $bcampo8;
    public $bcampo9;
    public $bcampo10;
    public $bproducto;
    public $bpreciocoste;
    public $bimagenelemento;


    function mount(Campaign $campaign){
        $this->campaign=$campaign;
        $this->cabecera=CampaignCabecera::where('campaign_id',$campaign->id)->first();
        $this->bcampo0=$this->cabecera->bcampo0==1 ? true : false;
        $this->bcampo1=$this->cabecera->bcampo1==1 ? true : false;
        $this->bcampo2=$this->cabecera->bcampo2==1 ? true : false;
        $this->bcampo3=$this->cabecera->bcampo3==1 ? true : false;
        $this->bcampo4=$this->cabecera->bcampo4==1 ? true : false;
        $this->bcampo5=$this->cabecera->bcampo5==1 ? true : false;
        $this->bcampo6=$this->cabecera->bcampo6==1 ? true : false;
        $this->bcampo7=$this->cabecera->bcampo7==1 ? true : false;
        $this->bcampo8=$this->cabecera->bcampo8==1 ? true : false;
        $this->bcampo9=$this->cabecera->bcampo9==1 ? true : false;
        $this->bcampo10=$this->cabecera->bcampo10==1 ? true : false;
        $this->bproducto=$this->cabecera->bproducto==1 ? true :false;
        $this->bpreciocoste=$this->cabecera->bpreciocoste==1 ? true :false;
    }

    public function render(){
        // $stores=CampaignStore::query()
        // ->where('campaign_id',$this->campaign->id)
        // ->whereHas('elementos')
        //     ->with('elementos')
        //     ->with('elementos.producto')
        //     ->paginate(7);
        // ->first();

        // dd($stores);

        $stores=CampaignStoreElemento::query()
        ->where('campaign_id',$this->campaign->id)
        ->with('campaignStore')
        ->with('campaignElemento')
        // ->whereHas('elementos')
        //     ->with('elementos')
        //     ->with('elementos.producto')
        // ->get();
                ->paginate(7);

        // dd($stores);
        return view('livewire.campaign.campaign-stores-elementos',compact('stores'));
    }
}
