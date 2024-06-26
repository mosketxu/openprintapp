<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class TempTableController extends Controller{
    /**
     * Create a temporary table with a variable number of columns.
     *
     * @param array $columns
     * @return \Illuminate\Http\JsonResponse
     */
    public function createTemporaryTable($columns, Campaign $campaign)
    {
        dd($columns);
        // $num=$columns-9;
        Schema::create($campaign->id, function (Blueprint $table) use ($columns) {
            $table->id();
            $table->foreignId('campaign_id')->constrained('campaigns')->onDelete('cascade');
            $table->string('cod')->nullable();
            $table->string('store')->nullable();
            $table->string('canal')->nullable();
            $table->string('direccion')->nullable();
            $table->string('poblacion')->nullable();
            $table->string('cp')->nullable();
            $table->string('provincia')->nullable();
            $table->string('telefono')->nullable();
            $table->string('idioma')->nullable();
            for ($i=1; $i < 34; $i++) {
                $table->string('campo'. $i);
            }
            $table->timestamps();
        });

        return response()->json(['message' => 'Temporary table created with columns: ' . implode(', ', $columns)]);
    }

    /**
     * Drop the temporary table.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function dropTemporaryTable()
    {
        Schema::dropIfExists($campaign->id);

        return response()->json(['message' => 'Temporary table dropped.']);
    }
}
