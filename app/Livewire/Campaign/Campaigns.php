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

        $entidad=Auth::user();
        $campaigns=Campaign::query()
            ->with('entidad')
            ->when(!empty($entidad->entidad_id),function($query) use($entidad){return $query->where('entidad_id','=',$entidad->entidad_id);})
            ->when($this->search!='',function($query) {return $query->where('name','LIKE','%'.$this->search.'%');})
            ->when($this->filtroentidad!='',function($query) {return $query->where('entidad_id','=',$this->filtroentidad);})
            ->when($this->filtroestado!='',function($query) {return $query->where('estado','=',$this->filtroestado);})
            ->orderBy('id','desc')
            ->get();


        $entidades=Entidad::query()
            ->when(!empty($entidad->entidad_id),function($query) use($entidad){return $query->where('id','=',$entidad->entidad_id);})
            ->whereIn('entidadtipo_id',['1','3'])
            ->orderBy('entidad')
            ->get();

        return view('livewire.campaign.campaigns',compact(['campaigns','entidades','entidad']));
    }

}
