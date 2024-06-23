<?php

namespace App\Livewire\Campaign;

use App\Models\Campaign;
use App\Models\Entidad;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Carbon;

class Campaigns extends Component
{

    public $search='';
    public $filtroentidad='';
    public $filtroestado='';

    public function render(){
        $cliente=Auth::user();
        $campaigns=Campaign::query()
            ->with('cliente')
            ->when(!empty($cliente->entidad_id),function($query) use($cliente){return $query->where('entidad_id','=',$cliente->entidad_id);})
            ->when($this->search!='',function($query) {return $query->where('name','LIKE','%'.$this->search.'%');})
            ->when($this->filtroentidad,function($query) {return $query->where('entidad_id','=',$this->filtroentidadad);})
            ->when($this->filtroestado,function($query) {return $query->where('estado','=',$this->filtroestado);})
            ->get();

        $entidades=Entidad::query()
            ->when(!empty($cliente->entidad_id),function($query) use($cliente){return $query->where('id','=',$cliente->entidad_id);})
            ->whereIn('entidadtipo_id',['1','3'])
            ->get();
        return view('livewire.campaign.campaigns',compact(['campaigns','entidades','cliente']));
    }

    public function delete($campaign){
        $camp = Campaign::find($campaign);
        // $campaignpropia=
        if(Auth::user()->entidad_id)
            if($camp->entidad_id!=Auth::user()->entidad_id)
                $this->dispatch('notifyred', 'No es propietario de esta campaña:');
        elseif($camp && $this->authorize('campaign.delete',$camp)) {
                $camp->delete();
                $this->dispatch('notify', 'La Campaña: '.$camp->name.' ha sido eliminada!');
        }
    }
}
