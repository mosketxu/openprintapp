<?php

namespace App\Http\Controllers;

use App\Imports\DynamicImport;
use App\Models\Campaign;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
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
    public function create(Campaign $campaign, Request $request){
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



    public function dropTemporaryTable(Campaign $campaign)
    {
        Schema::dropIfExists($campaign->id);
        return response()->json(['message' => 'Temporary table dropped.']);
    }
}
