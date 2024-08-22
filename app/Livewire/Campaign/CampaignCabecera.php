<?php

namespace App\Livewire\Campaign;

use App\Models\Campaign;
use App\Models\CampaignCabecera as ModelsCampaignCabecera;
use Livewire\Component;

class CampaignCabecera extends Component
{
    public $campaign;
    public $cabecera;

    public $campo0;
    public $campo1;
    public $campo2;
    public $campo3;
    public $campo4;
    public $campo5;
    public $campo6;
    public $campo7;
    public $campo8;
    public $campo9;
    public $campo10;
    public $elementificador;
    public $producto_id;
    public $preciocoste_ud;
    public $imagenelemento;
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


    protected function rules(){
        return [
            'campo0'=>'required',
            'campo1'=>'required',
            'campo2'=>'required',
            'campo3'=>'required',
            'campo4'=>'required',
            'campo5'=>'required',
            'campo6'=>'required',
            'campo7'=>'required',
            'campo8'=>'required',
            'campo9'=>'required',
            'campo10'=>'required',
        ];
    }

    function mount(Campaign $campaign){
        $this->campaign=$campaign;
        $this->cabecera=ModelsCampaignCabecera::where('campaign_id',$campaign->id)->first();
        $this->campo0=$campaign->cabecera->campo0;
        $this->campo1=$campaign->cabecera->campo1;
        $this->campo2=$campaign->cabecera->campo2;
        $this->campo3=$campaign->cabecera->campo3;
        $this->campo4=$campaign->cabecera->campo4;
        $this->campo5=$campaign->cabecera->campo5;
        $this->campo6=$campaign->cabecera->campo6;
        $this->campo7=$campaign->cabecera->campo7;
        $this->campo8=$campaign->cabecera->campo8;
        $this->campo9=$campaign->cabecera->campo9;
        $this->campo10=$campaign->cabecera->campo10;
        $this->elementificador=$campaign->cabecera->elementificador;
        $this->producto_id=$campaign->cabecera->producto_id;
        $this->preciocoste_ud=$campaign->cabecera->preciocoste_ud;
        $this->imagenelemento=$campaign->cabecera->imagenelemento;
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
        $this->bimagenelemento=$this->cabecera->bimagenelemento==1 ? true :false;

    }

    public function render()
    {

        return view('livewire.campaign.campaign-cabecera');
    }

    public function save(){
        $this->validate();

        $this->cabecera->update([
            'campo0'=>$this->campo0,
            'campo1'=>$this->campo1,
            'campo2'=>$this->campo2,
            'campo3'=>$this->campo3,
            'campo4'=>$this->campo4,
            'campo5'=>$this->campo5,
            'campo6'=>$this->campo6,
            'campo7'=>$this->campo7,
            'campo8'=>$this->campo8,
            'campo9'=>$this->campo9,
            'campo10'=>$this->campo10,
            'bcampo0'=>$this->bcampo0,
            'bcampo1'=>$this->bcampo1,
            'bcampo2'=>$this->bcampo2,
            'bcampo3'=>$this->bcampo3,
            'bcampo4'=>$this->bcampo4,
            'bcampo5'=>$this->bcampo5,
            'bcampo6'=>$this->bcampo6,
            'bcampo7'=>$this->bcampo7,
            'bcampo8'=>$this->bcampo8,
            'bcampo9'=>$this->bcampo9,
            'bcampo10'=>$this->bcampo10,
            'bproducto'=>$this->bproducto,
            'bpreciocoste'=>$this->bpreciocoste,
            'bimagenelemento'=>$this->bimagenelemento,
        ]);

        // $this->dispatch('banner-message',['style'=>'success','message'=>$message]);
        $this->dispatch('notify', 'Cabecera actualizada.');
    }
}
