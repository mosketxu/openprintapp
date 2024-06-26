<?php

namespace App\Http\Controllers;

use App\Imports\DynamicImport;
use App\Models\Campaign;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

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
            return response()->json(['data'=>'Fichero importado successfully.',201]);
        }catch(\Exception $ex){
            Log::info($ex);
            $notification = array('message' => 'La imagen ha sido borrada.','alert-type' => 'success');
            // return redirect()->back()->with($message='sdf');
            return redirect()->back()->with('success', 'Los datos se importaron correctamente.');

            // return response()->json(['data'=>'Some error has occur.',400]);

        }

        dd('sdf');
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
