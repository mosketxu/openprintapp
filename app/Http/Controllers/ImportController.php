<?php

namespace App\Http\Controllers;

use App\Imports\DynamicImport;
use App\Models\Campaign;
use App\Models\CampaignElemento;
use App\Models\CampaignStore;
use App\Models\CampaignStoreElemento;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use PDOException;

class ImportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Campaign $campaign){
        return view('import.index',compact('campaign'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function import(Campaign $campaign, Request $request){
        $request->validate(['fichero' => 'required|mimes:xls,xlsx',]);
        try{
            Excel::import(new DynamicImport($campaign->id), $request->file('fichero'));
            $campaign->estadoproceso='1';
            $campaign->fichero=$request->file('fichero')->getClientOriginalName();
            $campaign->fechafichero=Carbon::now();
            $campaign->save();
            return redirect()->back()->with('message', 'Fichero importado satisfactoriamente.');
        } catch (PDOException $ex) {
            // Ignorar errores de tipo PDOException
            Log::warning('PDOException ignorada: ' . $ex->getMessage());
            if($ex->getMessage()=='There is no active transaction'){
                $campaign->estadoproceso='1';
                $campaign->fichero=$request->file('fichero')->getClientOriginalName();
                $campaign->fechafichero=Carbon::now();
                $campaign->save();
                return redirect()->back()->with('message', 'Los datos se importaron correctamente.E1');
            }
            else{
                return redirect()->back()->with('errormessage', 'Ocurrió un error durante la importación. Por favor, inténtelo de nuevo.');
            }
        }catch(\Exception $ex){
            // Manejar cualquier otro tipo de error que ocurra durante la importación
            \Log::error('Error durante la importación de datos: ' . $ex->getMessage());
            return redirect()->back()->with('errormessage', 'Ocurrió un error durante la importación. Por favor, inténtelo de nuevo.');
        }

        // $this->dropTemporaryTable($campaign);
    }

    public function stores(Campaign $campaign){

        DB::table('campaign_stores')->where('campaign_id', $campaign->id)->delete();

        $datos=DB::table($campaign->id)->get();
        // Omitir los primeros hasta COD registros y recuperar el resto
        $datos = DB::table($campaign->id)->skip($campaign->filacod+1)->take(PHP_INT_MAX)->get();

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

        $campaign->estadoproceso='2';
        $campaign->save();
        return redirect()->back()->with('message', 'Las stores se importaron correctamente');
    }

    public function elementos(Campaign $campaign){

        DB::table('campaign_elementos')->where('campaign_id', $campaign->id)->delete();

        for ($numcolumna=1; $numcolumna < $campaign->numcolumnas-8; $numcolumna++) {
            $idElemento=$this->insertaElemento($numcolumna,$campaign);
            $this->insertaElementosPorStore($numcolumna,$idElemento,$campaign);
        }
        $campaign->estadoproceso='3';
        $campaign->save();
        return redirect()->back()->with('message', 'Todos los datos se han importado correctamente');
    }

    function insertaElemento($numcolumna,$campaign) {
        $nombreColumna="campo$numcolumna";
        $elementos = DB::table($campaign->id)->select($nombreColumna)->take($campaign->filacod+1)->get();

        // Definir el mapeo entre los campos originales y los campos de la nueva tabla
        $mapeo = [
            'campaign_id' => $campaign->id,
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

    function insertaElementosPorStore($numcolumna,$idElemento,$campaign) {
        $nombreColumna="campo$numcolumna";
        $elementos = DB::table($campaign->id)->select('id','cod',$nombreColumna)->skip($campaign->filacod+1    )->take(PHP_INT_MAX)->get();

        $insertData = [];

        foreach ($elementos as $elemento) {
            if($elemento->$nombreColumna){
                $store=CampaignStore::where('cod',$elemento->cod)->where('campaign_id',$campaign->id)->first();
                CampaignStoreElemento::insert([
                    'campaign_id' => $campaign->id,
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

    public function getTableInfo($tableName){
        // Obtener la lista de columnas de la tabla
        $columns = Schema::getColumnListing($tableName);
        // Contar el número de columnas
        $numberOfColumns = count($columns);
        // Encontrar la posición del campo "campo1"
        $position = array_search('campo1', $columns);
        // Si el campo no existe, array_search retorna false
        if ($position === false) {
            $position = 'El campo "campo1" no existe en la tabla.';
        } else {
            // Convertir a una posición basada en 1
            $position += 1;
        }
        return response()->json([
            'number_of_columns' => $numberOfColumns,
            'position_of_campo1' => $position
        ]);
    }

    public function dropTemporaryTable(Campaign $campaign){
        Schema::dropIfExists($campaign->id);
        return response()->json(['message' => 'Temporary table dropped.']);
    }
}
