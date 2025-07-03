<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\CampaignStore;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Carbon;

class CampaignController extends Controller
{
    public function index(){
        return view('campaign.index');
    }

    public function create(){
        return view('campaign.create');
    }

    public function edit(Campaign $campaign){
        return view('campaign.edit',compact('campaign'));
    }

    public function datos(Campaign $campaign){
        return view('campaign.datos',compact('campaign'));
    }

    public function stores(Campaign $campaign){
        return view('campaign.stores',compact('campaign'));
    }

    public function elementos(Campaign $campaign){
        return view('campaign.elementos',compact('campaign'));
    }

    public function storeselementos(Campaign $campaign){
        return view('campaign.storeselementos',compact('campaign'));
    }

    public function elementosQ(Campaign $campaign){
        return view('campaign.elementos-q',compact('campaign'));
    }

    public function etiquetaspdf(Campaign $campaign){

        $today=Carbon::now()->format('d/m/Y');
        $campaign=$campaign->where('id',$campaign->id)->with('entidad','cabecera')->first();
        // dd($campaign);
        $etiquetas=CampaignStore::query()
        ->where('campaign_id',$campaign->id)
        ->whereHas('campaignStoreElementos')
        ->with('campaignStoreElementos')
        ->where('campaign_id',$campaign->id)
        ->get();

        $path = storage_path('app/public/etiquetas.pdf'); // Cambia el nombre y la ubicación del archivo según corresponda

            // Eliminar el archivo anterior si existe
        if (File::exists($path)) {
            File::delete($path);
        }

            // Mostrar la vista directamente para depurar
        // return view('campaign.etiquetas', compact('etiquetas', 'campaign', 'today'));

        $pdf = \PDF::loadView('campaign.etiquetas',compact('etiquetas','campaign','today'));
                $pdf->setPaper('a4','portrait');
                // return $pdf->stream(); // así lo muestra en pantalla
                return $pdf->stream('etiquetas_' . time() . '.pdf');
                // return $pdf->download('etiquetas.pdf'); //así lo descarga

    }

        public function etiquetashtml(Campaign $campaign){

        $today=Carbon::now()->format('d/m/Y');
        $campaign=$campaign->where('id',$campaign->id)->with('entidad','cabecera')->first();
        // dd($campaign);
        $etiquetas=CampaignStore::query()
        ->where('campaign_id',$campaign->id)
        ->whereHas('campaignStoreElementos')
        ->with('campaignStoreElementos')
        ->where('campaign_id',$campaign->id)
        ->get();

        $path = storage_path('app/public/etiquetas.pdf'); // Cambia el nombre y la ubicación del archivo según corresponda

            // Eliminar el archivo anterior si existe
        if (File::exists($path)) {
            File::delete($path);
        }

            // Mostrar la vista directamente para depurar
        return view('campaign.etiquetas', compact('etiquetas', 'campaign', 'today'));

        // $pdf = \PDF::loadView('campaign.etiquetas',compact('etiquetas','campaign','today'));
        //         $pdf->setPaper('a4','portrait');
        //         // return $pdf->stream(); // así lo muestra en pantalla
        //         return $pdf->stream('etiquetas_' . time() . '.pdf');
        //         // return $pdf->download('etiquetas.pdf'); //así lo descarga

    }

    public function cabecera(Campaign $campaign){
        return view('campaign.cabecera',compact('campaign'));
    }

}
