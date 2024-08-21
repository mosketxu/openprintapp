<?php

namespace App\Livewire\Campaign;

use App\Models\Campaign;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\CampaignCabecera;

class CampaignElementosQ extends Component
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

    function mount(Campaign $campaign){
        $this->campaign=$campaign;

        $this->cabecera=CampaignCabecera::where('campaign_id',$campaign->id)->first();
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
        $this->bpreciocoste=$this->cabecera->bpreciocoste==1 ? false :true;
        $this->bimagenelemento=$this->cabecera->bimagenelemento==1 ? true :false;

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
            'campaign_elementos.preciocoste_ud',
            'campaign_elementos.imagenelemento',
            'productos.descripcion',
            DB::raw('SUM(campaign_store_elementos.cantidad) as cantidadtotal'))
        ->join('campaign_elementos', 'campaign_store_elementos.campaign_elemento_id', '=', 'campaign_elementos.id')
        ->leftJoin('productos', 'productos.id', '=', 'campaign_elementos.producto_id')
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
            'campaign_elementos.preciocoste_ud',
            'campaign_elementos.imagenelemento',
            'productos.descripcion',
            )
        ->get();

        // dd($elementos);
        return view('livewire.campaign.campaign-elementos-q',compact('elementos'));
    }


}
