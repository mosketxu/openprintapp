<?php

namespace App\Http\Controllers;

use App\Imports\DynamicImport;
use App\Models\Campaign;
use App\Models\CampaignElemento;
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
            $campaign->save();
            return redirect()->back()->with('message', 'Fichero importado satisfactoriamente.');
        } catch (PDOException $ex) {
            // Ignorar errores de tipo PDOException
            Log::warning('PDOException ignorada: ' . $ex->getMessage());
            if($ex->getMessage()=='There is no active transaction'){
                $campaign->estadoproceso='1';
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

    public function tiendas(Campaign $campaign){

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
                'idioma'=>$dato->idioma
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
        return redirect()->back()->with('message', 'Las tiendas se importaron correctamente');

    }

    public function elementostemp(Campaign $campaign){
        $tablenumbers=json_decode($this->getTableInfo($campaign->id)->getContent(),true);
        $numcampos=$tablenumbers['number_of_columns'];
        $poscampo1=$tablenumbers['position_of_campo1'];

        $datos=DB::table($campaign->id)->get();

        $encontrado = false;// Variable para indicar si se ha encontrado "COD"
        $batchSize = 100; // Ajusta según sea necesario
        $batch = [];

        // Inicializar un array para almacenar todos los campos encontrados
        $camposEncontrados = [];
        $elementificador='';
        foreach ($datos as $dato) {
            if (!$encontrado) {
                if (strtoupper($dato->cod) == "COD") {
                    $encontrado = true;
                }
                $campoArray = []; // Inicializar un array para los campos de esta iteración

                for ($i = 1; $i <= $numcampos - $poscampo1 - 1; $i++) { // Recorrer todos los campos a partir de 'campo1'
                    $nombreCampo = 'campo'.$i;
                    $campoArray[$nombreCampo] = $dato->$nombreCampo;
                }

                $camposEncontrados[] = $campoArray; // Agregar $campoArray al array $camposEncontrados
            }
        }

        $registros=[];

        for ($campo = 1; $campo <= $numcampos - $poscampo1 - 1; $campo++) {
            $valoresCampo = [];

        foreach ($camposEncontrados as $fila) {
            // Obtener el valor del campo actual
            $nombreCampo = 'campo' . $campo;
            $valoresCampo[] = $fila[$nombreCampo]; // Asumiendo que los índices coinciden
        }
            $primerValor = reset($fila); // Obtiene el primer valor de la fila
            $primerosValores[] = $primerValor;
        }

        // Agregar los valores del campo actual al registro
        $registros["campo$campo"] = $valoresCampo;

        $i=0;
        foreach($camposEncontrados as $index=>$fila){
            $registro = new CampaignElemento();
                for ($campo = 1; $campo <= $numcampos - $poscampo1 - 1; $campo++) {
                    $registro->campaign_id=$campaign->id;
                    $nombreCampo = 'campo' . $campo;
                    $registro->imagen=$fila[$nombreCampo];
                    $registro->campo1=$fila[$nombreCampo];
                    $registro->campo2=$fila[$nombreCampo];
                    $registro->campo3=$fila[$nombreCampo];
                    $registro->campo4=$fila[$nombreCampo];
                    $registro->campo5=$fila[$nombreCampo];
                    $registro->categoria=$fila[$nombreCampo];
                    $registro->archivo=$fila[$nombreCampo];
                    $registro->material=$fila[$nombreCampo];
                    $registro->medida=$fila[$nombreCampo];
                    $registro->idioma=$fila[$nombreCampo];
                    $registro->elementificador=$i++;

                    $registro->save();
                }
        }

        // para campo1
        // foreach($primerosValores as $index=>$valor){
        //     $registro = new CampaignElemento();
        //     $registro->campaign_id=$campaign->id;
        //     $registro->imagen=$primerosValores[0];
        //     $registro->campo1=$primerosValores[1];
        //     $registro->campo2=$primerosValores[2];
        //     $registro->campo3=$primerosValores[3];
        //     $registro->campo4=$primerosValores[4];
        //     $registro->campo5=$primerosValores[5];
        //     $registro->categoria=$primerosValores[6];
        //     $registro->archivo=$primerosValores[7];
        //     $registro->material=$primerosValores[8];
        //     $registro->medida=$primerosValores[9];
        //     $registro->idioma=$primerosValores[10];
        //     $registro->elementificador=$i++;

        //     $registro->save();
        // }

        dd('aver' );


            // // Preparar los datos para la inserción
            // $batch[] = [
            //     'campaign_id' => $dato->campaign_id,
            //     'cod' => $dato->cod,
            //     'store'=>$dato->store,
            //     'canal'=>$dato->canal,
            //     'direccion'=>$dato->direccion,
            //     'poblacion'=>$dato->poblacion,
            //     'cp'=>$dato->cp,
            //     'provincia'=>$dato->provincia,
            //     'telefono'=>$dato->telefono,
            //     'idioma'=>$dato->idioma
            // ];

            // // Si el lote alcanza el tamaño definido, insertar los datos y vaciar el lote
            // if (count($batch) >= $batchSize) {
            //     DB::table('campaign_stores')->insert($batch);
            //     $batch = [];
            // }


        // Insertar cualquier lote restante
        // if (!empty($batch)) {
        //     DB::table('campaign_stores')->insert($batch);
        // }


        $campaign->estadoproceso='2';
        $campaign->save();
        return redirect()->back()->with('message', 'Las tiendas se importaron correctamente');

    }

    public function elementos(Campaign $campaign){

        // voy a recorrer cada una de las columnas y en los primeros filaCod guardo el elemento y en los siguientes el numero de elemento por tienda.

        //primera columna
        DB::table('campaign_elementos')->where('campaign_id', $campaign->id)->delete();
        for ($i=1; $i < $campaign->numcolumnas-8; $i++) {
            $idElemento=$this->insertaElemento($i,$campaign);
            # code...
        }
        dd('avesr');

    }

    function insertaElemento($i,$campaign) {
        $nombreColumna="campo$i";
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
        ];
        // Insertar el nuevo registro en la nueva tabla
        $idInsertado=DB::table('campaign_elementos')->insertGetId(array_merge($mapeo, [
            'created_at' => now(),
            'updated_at' => now()
        ]));

        return $idInsertado;
    }

    static public function elementificador($elementos,$nombreColumna){
        // Iterar sobre los registros y concatenar los datos
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
        /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getTableInfo($tableName)
    {
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

    public function dropTemporaryTable(Campaign $campaign)
    {
        Schema::dropIfExists($campaign->id);
        return response()->json(['message' => 'Temporary table dropped.']);
    }
}
