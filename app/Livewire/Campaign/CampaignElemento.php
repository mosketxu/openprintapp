<?php

namespace App\Livewire\Campaign;

use App\Models\Campaign;
use App\Models\CampaignCabecera;
use App\Models\CampaignElemento as ModelsCampaignElemento;
use App\Models\Producto;
use Livewire\Component;


class CampaignElemento extends Component
{
    public $campaign;
    public $campaignElemento;
    public $imagen;
    public $campo1;
    public $campo2;
    public $campo3;
    public $campo4;
    public $campo5;
    public $categoria;
    public $archivo;
    public $material;
    public $medida;
    public $elementificador;
    public $producto_id;
    public $preciocoste_ud;
    public $imagenelemento;
    public $created_at;
    public $updated_at;


    function mount(ModelsCampaignElemento $campaignElemento){
        $this->campaignElemento=$campaignElemento;
        $this->campaign=Campaign::find($campaignElemento->campaign_id);
        $this->imagen=$campaignElemento->imagen;
        $this->campo1=$campaignElemento->campo1;
        $this->campo2=$campaignElemento->campo2;
        $this->campo3=$campaignElemento->campo3;
        $this->campo4=$campaignElemento->campo4;
        $this->campo5=$campaignElemento->campo5;
        $this->categoria=$campaignElemento->categoria;
        $this->archivo=$campaignElemento->archivo;
        $this->material=$campaignElemento->material;
        $this->medida=$campaignElemento->medida;
        $this->elementificador=$campaignElemento->elementificador;
        $this->producto_id=$campaignElemento->producto_id;
        $this->preciocoste_ud=$campaignElemento->preciocoste_ud;
        $this->imagenelemento=$campaignElemento->imagenelemento;
        $this->created_at=$campaignElemento->created_at;
        $this->updated_at=$campaignElemento->updated_at;
    }

    public function render()
    {
        $productos=Producto::orderBy('descripcion')->get();
        $cabecera=CampaignCabecera::where('campaign_id',$this->campaign->id)->first();
        return view('livewire.campaign.campaign-elemento',compact('cabecera','productos'));
    }

    public function save(){
        // $this->validate();

        $this->campaignElemento->update([
            'imagen'=>$this->imagen,
            'campo1'=>$this->campo1,
            'campo2'=>$this->campo2,
            'campo3'=>$this->campo3,
            'campo4'=>$this->campo4,
            'campo5'=>$this->campo5,
            'categoria'=>$this->categoria,
            'archivo'=>$this->archivo,
            'material'=>$this->material,
            'medida'=>$this->medida,
            'elementificador'=>$this->elementificador,
            'producto_id'=>$this->producto_id,
            'preciocoste_ud'=>$this->preciocoste_ud,
            'imagenelemento'=>$this->imagenelemento,
            // 'created_at'=>$this->created_at,
            // 'updated_at'=>$this->updated_at,

        ]);
        $this->dispatch('notify', 'Elemento actualizado.');
    }
}
