<?php

namespace App\Livewire\Import;

use App\Models\Campaign;
use App\Models\CampaignStore;
use App\Models\CampaignStoreElemento;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Schema;
// use PDOException;

class Import extends Component
{
    public $campaign;
    public $estadoproceso='0';

    function mount(Campaign $campaign) {
        $this->campaign=$campaign;
        $this->estadoproceso=$campaign->estadoproceso;
    }

    public function render(){
        return view('livewire.import.import');
    }

    public function stores(Campaign $campaign){

        DB::table('campaign_stores')->where('campaign_id', $this->campaign->id)->delete();

        $datos=DB::table($this->campaign->id)->get();
        // Omitir los primeros hasta COD registros y recuperar el resto
        $datos = DB::table($this->campaign->id)->skip($this->campaign->filacod+1)->take(PHP_INT_MAX)->get();

        $batchSize = 100; // Ajusta según sea necesario
        $batch = [];

        // Recorrer la colección para encontrar "COD"
        foreach ($datos as $dato) {
            $batch[] = [
                'campaign_id' => $dato->campaign_id,
                'cod' => $dato->cod,
                'store'=>$dato->store,
                'canal'=>$dato->canal,
                'direccion'=>$dato->direccion,
                'poblacion'=>$dato->poblacion,
                'cp'=>$dato->cp,
                'provincia'=>$dato->provincia,
                'telefono'=>$dato->telefono,
                'idioma'=>$dato->idioma,
                'created_at'=>now(),
                'updated_at'=>now(),
            ];

            // Si el lote alcanza el tamaño definido, insertar los datos y vaciar el lote
            if (count($batch) >= $batchSize) {
                DB::table('campaign_stores')->insert($batch);
                $batch = [];
            }
        }

        // Insertar cualquier lote restante
        if (!empty($batch)) {
            DB::table('campaign_stores')->insert($batch);
        }

        $this->campaign->estadoproceso='10';
        $this->campaign->save();
        // session()->flash('message', 'El archivo se ha importado correctamente.');
        // return redirect()->back()->with('message', 'Las stores se importaron correctamente');
        $this->elementos();
    }

    public function elementos(){

        DB::table('campaign_elementos')->where('campaign_id', $this->campaign->id)->delete();

        for ($numcolumna=1; $numcolumna < $this->campaign->numcolumnas-8; $numcolumna++) {
            $idElemento=$this->insertaElemento($numcolumna);
            $this->insertaElementosPorStore($numcolumna,$idElemento);
        }
        $this->campaign->estadoproceso='3';
        $this->campaign->save();
        return redirect()->back()->with('message', 'Todos los datos se han importado correctamente');
    }

    function insertaElemento($numcolumna) {
        $nombreColumna="campo$numcolumna";
        $elementos = DB::table($this->campaign->id)->select($nombreColumna)->take($this->campaign->filacod+1)->get();

        // Definir el mapeo entre los campos originales y los campos de la nueva tabla
        $mapeo = [
            'campaign_id' => $this->campaign->id,
            'imagen' => $elementos[0]->$nombreColumna,
            'campo1' => $elementos[1]->$nombreColumna,
            'campo2' => $elementos[2]->$nombreColumna,
            'campo3' => $elementos[3]->$nombreColumna,
            'campo4' => $elementos[4]->$nombreColumna,
            'campo5' => $elementos[5]->$nombreColumna,
            'categoria' => $elementos[6]->$nombreColumna,
            'archivo' => $elementos[7]->$nombreColumna,
            'material' => $elementos[8]->$nombreColumna,
            'medida' => $elementos[9]->$nombreColumna,
            'idioma' => $elementos[10]->$nombreColumna,
            'elementificador' => $this->elementificador($elementos,$nombreColumna),
            'created_at' => now(),
            'updated_at' => now(),
        ];
        // Insertar el nuevo registro en la nueva tabla
        $idInsertado=DB::table('campaign_elementos')->insertGetId(array_merge($mapeo, [
            'created_at' => now(),
            'updated_at' => now()
        ]));

        return $idInsertado;
    }

    function insertaElementosPorStore($numcolumna,$idElemento) {
        $nombreColumna="campo$numcolumna";
        $elementos = DB::table($this->campaign->id)->select('id','cod',$nombreColumna)->skip($this->campaign->filacod+1    )->take(PHP_INT_MAX)->get();

        $insertData = [];

        foreach ($elementos as $elemento) {
            if($elemento->$nombreColumna){
                $store=CampaignStore::where('cod',$elemento->cod)->where('campaign_id',$this->campaign->id)->first();
                CampaignStoreElemento::insert([
                    'campaign_id' => $this->campaign->id,
                    'campaign_store_id' => $store->id,
                    'campaign_elemento_id' => $idElemento,
                    'cantidad' => $elemento->$nombreColumna,
                    'created_at' => now(),
                    'updated_at' => now(),
                    ]
                );
            }
        }
    }

    static public function elementificador($elementos,$nombreColumna){
        $elementificador = '';
        foreach ($elementos as $elemento) {
            $elementificador .= $elemento->$nombreColumna . ' ';
        }
        $elementificador=strtolower($elementificador);
        $sust=array(" ","/","-","(",")","á","é","í",'ó','ú',"Á","É","Í",'Ó','Ú','.');
        $por=array("","","","","","a","e","i",'o','u',"A","E","I",'O','U','.');
        $elementificador= trim(str_replace($sust,$por,$elementificador));
        return $elementificador;
    }

}
