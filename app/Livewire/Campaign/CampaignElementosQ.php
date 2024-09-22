<?php

namespace App\Livewire\Campaign;

use App\Exports\CampaignElementosQExport;
use App\Models\Campaign;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\CampaignCabecera;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

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
        $this->bpreciocoste=$this->cabecera->bpreciocoste==1 ? true :false;
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
            return view('livewire.campaign.campaign-elementos-q',compact('elementos'));
        }

    public function resumenelementosXls($salida) {

        // dd($salida);

        $campos_fijos_inicio=['campaigns.name'];
        $campos_fijos_final=[
            DB::raw('SUM(campaign_store_elementos.cantidad) as cantidadtotal')
        ];

        // Iniciar la query con los campos fijos al inicio
        $query = DB::table('campaign_store_elementos')
            ->join('campaign_stores', 'campaign_stores.id', '=', 'campaign_store_elementos.campaign_store_id')
            ->join('campaign_elementos', 'campaign_store_elementos.campaign_elemento_id', '=', 'campaign_elementos.id')
            ->join('campaigns', 'campaign_store_elementos.campaign_id', '=', 'campaigns.id')
            ->leftJoin('productos', 'productos.id', '=', 'campaign_elementos.producto_id')
            ->where('campaign_store_elementos.campaign_id', $this->campaign->id)
            ->select($campos_fijos_inicio);

            // dd('es:'. $this->bcampo0);
            // Agregar los campos condicionales
        $query->when($salida == 'constore', function ($q) {$q->addSelect('campaign_stores.store')->groupBy('campaign_stores.store');});
        $query->when($this->bcampo0 == '1', function ($q) {$q->addSelect('campaign_elementos.imagen')->groupBy('campaign_elementos.imagen');});
        $query->when($this->bcampo1 == '1', function ($q) {$q->addSelect('campaign_elementos.campo1')->groupBy('campaign_elementos.campo1');});
        $query->when($this->bcampo2 == '1', function ($q) {$q->addSelect('campaign_elementos.campo2')->groupBy('campaign_elementos.campo2');});
        $query->when($this->bcampo3 == '1', function ($q) {$q->addSelect('campaign_elementos.campo3')->groupBy('campaign_elementos.campo3');});
        $query->when($this->bcampo4 == '1', function ($q) {$q->addSelect('campaign_elementos.campo4')->groupBy('campaign_elementos.campo4');});
        $query->when($this->bcampo5 == '1', function ($q) {$q->addSelect('campaign_elementos.campo5')->groupBy('campaign_elementos.campo5');});
        $query->when($this->bcampo6 == '1', function ($q) {$q->addSelect('campaign_elementos.categoria')->groupBy('campaign_elementos.categoria');});
        $query->when($this->bcampo7 == '1', function ($q) {$q->addSelect('campaign_elementos.archivo')->groupBy('campaign_elementos.archivo');});
        $query->when($this->bcampo8 == '1', function ($q) {$q->addSelect('campaign_elementos.material')->groupBy('campaign_elementos.material');});
        $query->when($this->bcampo9 == '1', function ($q) {$q->addSelect('campaign_elementos.medida')->groupBy('campaign_elementos.medida');});
        $query->when($this->bcampo10 == '1', function ($q) {$q->addSelect('campaign_elementos.idioma')->groupBy('campaign_elementos.idioma');});
        $query->when($this->bproducto == '1', function ($q) {$q->addSelect('productos.descripcion')->groupBy('productos.descripcion');});
        $query->when($this->bpreciocoste == '1', function ($q) {$q->addSelect('campaign_elementos.preciocoste_ud')->groupBy('campaign_elementos.preciocoste_ud');});
        $query->when($this->bimagenelemento == '1', function ($q) {$q->addSelect('campaign_elementos.imagenelemento')->groupBy('campaign_elementos.imagenelemento');});

        // Agregar los campos fijos al final
        $query->addSelect($campos_fijos_final);

        // Añadir otros groupBy obligatorios
        $query->groupBy(
            'campaigns.name',
        );

        $elementos=$query->get();

        $today=Carbon::now()->format('d/m/Y');
        return Excel::download(new CampaignElementosQExport($elementos,$today,$salida,$this->cabecera), 'elementos'.$this->campaign->id.'.xlsx');
    }

}
