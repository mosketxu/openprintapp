<?php

namespace App\Livewire\Campaign;

use App\Models\Campaign as ModelsCampaign;
use App\Models\CampaignCabecera;
use App\Models\Entidad;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Validation\Rule;

class Campaign extends Component
{

    public $campaign;
    public $deshabilitado="false";

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
            'name'=>'required',
            'entidad_id'=>'required',
            'fechainicio'=>'required|date',
            'fechafin'=>'nullable|date',
            'estado'=>'required',
            'fechainstal1'=>'nullable|date',
            'fechainstal2'=>'nullable|date',
            'fechainstal3'=>'nullable|date',
            'montaje1'=>'nullable',
            'montaje2'=>'nullable',
            'montaje3'=>'nullable'
        ];
    }

    public function mount(ModelsCampaign $campaign){
        $this->campaign=$campaign;
        $this->name=$campaign->name;
        $this->entidad_id=$campaign->entidad_id;
        $this->fechainicio= $campaign->fechainicio;
        if (!$this->fechainicio) $this->fechainicio=Carbon::now()->format('Y-m-d');
        $this->fechafin=$campaign->fechafin;
        $this->estado=$campaign->estado ? $campaign->estado : '0';
        $this->fechainstal1=$campaign->fechainstal1;
        $this->fechainstal2=$campaign->fechainstal2;
        $this->fechainstal3=$campaign->fechainstal3;
        $this->montaje1=$campaign->montaje1;
        $this->montaje2=$campaign->montaje2;
        $this->montaje3=$campaign->montaje3;

        $this->deshabilitado=Auth::user()->hasRole(['Cliente','Tienda','Montador']) ? 'true' : '';
    }


    public function render(){
        $ent=Auth::user();

        $entidades=Entidad::query()
        ->when(!empty($ent->entidad_id),function($query) use($ent){return $query->where('id','=',$ent->entidad_id);})
        ->whereIn('entidadtipo_id',['1','3'])
        ->get();

        if(!$this->entidad_id)
            $this->entidad_id=$ent->entidad_id ? $entidades->first()->id : '';

        if($this->deshabilitado!='true')
            return view('livewire.campaign.campaign',compact(['ent','entidades']));
        else
            return view('livewire.campaign.campaignshow',compact(['ent','entidades']));
    }

    public function save(){
        $this->validate();
        $i = $this->campaign->id ? $this->campaign->id : '';
        $message=$this->campaign->referencia . "Acción realizada satisfactoriamente";

        $camp=ModelsCampaign::updateOrCreate([
            'id'=>$i
        ],[
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

        $this->showSuccessIndicator = true;
        $cabecera=CampaignCabecera::where('campaign_id',$camp->id)->count();
        if($cabecera=='0')
            CampaignCabecera::create([
                'campaign_id'=>$camp->id,
                'campo0'=>'Imagen',
                'campo1'=>'Campo1',
                'campo2'=>'Campo2',
                'campo3'=>'Campo3',
                'campo4'=>'Campo4',
                'campo5'=>'Campo5',
                'campo6'=>'Categoria',
                'campo7'=>'Archivo',
                'campo8'=>'Material',
                'campo9'=>'Medida',
                'campo10'=>'Idioma',
                'elementificador'=>'Elementificador',
                'producto_id'=>'Producto',
                'preciocoste_ud'=>'Precio',
                'imagenelemento'=>'Fichero',
                'bcampo0'=>true,
                'bcampo1'=>true,
                'bcampo2'=>true,
                'bcampo3'=>true,
                'bcampo4'=>true,
                'bcampo5'=>true,
                'bcampo6'=>true,
                'bcampo7'=>true,
                'bcampo8'=>true,
                'bcampo9'=>true,
                'bcampo10'=>true,
                'bproducto'=>true,
                'bpreciocoste'=>false,
                'bimagenelemento'=>true,
            ]);

        return redirect()->route('campaign.edit',$camp)->with('message', 'Campaña creada correctamente');

        // return $this->redirect('/');
    }

    public function delete($campaign){
        $camp = ModelsCampaign::find($campaign);

        if(!Auth::user()->hasRole(['Admin','Gestion']))
            $this->dispatch('notifyred', 'No tiene autorización para eliminar esta campaña:');
        elseif($camp && $this->authorize('campaign.delete',$camp)) {
            $camp->delete();
            return redirect()->route('campaign.index',$camp)->with('message', 'Campaña '.$camp->name .' eliminada.');
        }
    }

}
