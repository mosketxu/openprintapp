<?php

namespace App\Livewire\Campaign;

use App\Exports\CampaignElementoExport;
use App\Models\CampaignElemento;
use App\Models\Campaign;
use App\Models\CampaignCabecera;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

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
        ->paginate(7);
        // ->get();
        // dd($cabecera);

        return view('livewire.campaign.campaign-elementos', compact('elementos','cabecera'));
    }

    public function elementosXls() {

        $elementos = DB::table('campaign_elementos')
        ->leftJoin('productos', 'productos.id', '=', 'campaign_elementos.producto_id')
        ->select('campaign_elementos.id','campaign_elementos.campaign_id','campaign_elementos.imagen',
            'campaign_elementos.campo1','campaign_elementos.campo2','campaign_elementos.campo3','campaign_elementos.campo4',
            'campaign_elementos.campo5','campaign_elementos.categoria','campaign_elementos.archivo','campaign_elementos.material',
            'campaign_elementos.medida','campaign_elementos.idioma','campaign_elementos.elementificador',
            'campaign_elementos.producto_id',
            'productos.descripcion',
            'campaign_elementos.preciocoste_ud','campaign_elementos.imagenelemento',
            'campaign_elementos.created_at','campaign_elementos.updated_at')
        ->where('campaign_id',$this->campaign->id)
        ->get();

        $today=Carbon::now()->format('d/m/Y');
        return Excel::download(new CampaignElementoExport($elementos,$today), 'elementos'.$this->campaign->id.'.xlsx');
    }
}
