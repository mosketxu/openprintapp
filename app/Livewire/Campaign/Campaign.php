<?php

namespace App\Livewire\Campaign;

use App\Models\Campaign as ModelsCampaign;
use App\Models\Entidad;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
// use Livewire\Attributes\Validate;
use Illuminate\Validation\Rule;

class Campaign extends Component
{

    public $campaign;
    public $deshabilitado="";

    public $name='';
    public $entidad_id;
    public $fechainicio;
    public $fechafin;
    public $estado='0';
    public $fechainstal1;
    public $fechainstal2;
    public $fechainstal3;
    public $montaje1;
    public $montaje2;
    public $montaje3;

    public $showSuccessIndicator = false;

    protected function rules(){
        return [
            'name'=>'required|unique:campaigns,name',
            'entidad_id'=>'required',
            'fechainicio'=>'required|date',
            'fechafin'=>'required|date',
            'estado'=>'required|date',
            'fechainstal1'=>'nullable|date',
            'fechainstal2'=>'nullable|date',
            'fechainstal3'=>'nullable|date',
            'montaje1'=>'nullable|date',
            'montaje2'=>'nullable|date',
            'montaje3'=>'nullable|date'
        ];
    }

    public function mount(ModelsCampaign $campaign){
        $this->campaign=$campaign;
        $this->name=$campaign->name;
        $this->entidad_id=$campaign->entidad_id;
        $this->fechainicio=$campaign->fechainicio;
        $this->fechafin=$campaign->fechafin;
        $this->estado=$campaign->estado;
        $this->fechainstal1=$campaign->fechainstal1;
        $this->fechainstal2=$campaign->fechainstal2;
        $this->fechainstal3=$campaign->fechainstal3;
        $this->montaje1=$campaign->montaje1;
        $this->montaje2=$campaign->montaje2;
        $this->montaje3=$campaign->montaje3;

        // $this->deshabilitado=Auth::user()->hasRole(['Admin','Gestor']) ? '' : 'disabled';
    }


    public function render()
    {

        // dd($this->campaign);
        $cliente=Auth::user();

        $entidades=Entidad::query()
        ->when(!empty($cliente->entidad_id),function($query) use($cliente){return $query->where('id','=',$cliente->entidad_id);})
        ->whereIn('entidadtipo_id',['1','3'])
        ->get();

        $this->entidad_id=$cliente->entidad_id ? $entidades->first()->id : '';

        return view('livewire.campaign.campaign',compact(['cliente','entidades']));
    }

    public function save(){

        $this->validate();
        if($this->campaign->id){
            $i=$this->campaign->id;
            $this->validate([
                'campaign.name'=>[
                    'required',
                    Rule::unique('campaigns','name')->ignore($this->campaign->id)
                    ],
                ],
            );
            $message=$this->campaign->referencia . " Actualizado satisfactoriamente";
        }else{
            // $this->validate(['campaign.name'=>'required|unique:campaigns,name',]);
            $i=$this->campaign->id;
            $message=$this->campaign->referencia . " creado satisfactoriamente";
        }
        // dd($message);
        $camp=ModelsCampaign::updateOrCreate([
            'id'=>$i
        ],
        [
            'name'=>$this->name,
            'entidad_id'=>$this->entidad_id,
            'fechainicio'=>$this->fechainicio,
            'fechafin'=>$this->fechafin,
            'estado'=>$this->estado,
            'fechainstal1'=>$this->fechainstal1,
            'fechainstal2'=>$this->fechainstal2,
            'fechainstal3'=>$this->fechainstal3,
            'montaje1'=>$this->montaje1,
            'montaje2'=>$this->montaje2,
            'montaje3'=>$this->montaje3,
            ]
        );

        session()->flash('status', 'Post successfully updated.');

        return $this->redirect('/campaigns');

        // sleep(1);

        // $this->showSuccessIndicator = true;
        // $this->dispatch('banner-message',['style'=>'success','message'=>$message]);
        // dd($camp);
        // session()->flash('flash.bannerStyle', 'success');

        // return $this->redirect('/');
        // $this->dispatchBrowserEvent('notify', $mensaje);
    }


}
