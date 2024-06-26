<?php

namespace App\Imports;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\DB;

class DynamicImport implements ToCollection
{

    protected $tableName;

    public function __construct($tableName)
    {
        $this->tableName = $tableName;
    }

    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows){

        if ($rows->isEmpty()) {return;}

        $maxcolumnas=$this->maxcolumna($rows);

        if(Schema::hasTable($this->tableName))
            $this->dropTemporaryTable();

        $this->createTemporaryTable($maxcolumnas);

        foreach ($rows as $row) {
            $rowArray = $row->toArray();
            $dataToInsert = [];

            $dataToInsert=[
                'campaign_id' => $this->tableName,
                'cod' => $rowArray[0],
                'store'=>$rowArray[1],
                'canal'=>$rowArray[2],
                'direccion'=>$rowArray[3],
                'poblacion'=>$rowArray[4],
                'cp'=>$rowArray[5],
                'provincia'=>$rowArray[6],
                'telefono'=>$rowArray[7],
                'idioma'=>$rowArray[8]
            ];

            for ($i = 9; $i < $maxcolumnas; $i++) {
                $dataToInsert['campo' . ($i-8)] = $rowArray[$i] ?? null;
            }

            DB::table($this->tableName)->insert($dataToInsert);

        }
        return back()->with('success', 'Data imported successfully into table: ' . $this->tableName);

    }

    public function maxcolumna(Collection $rows){
        $maxColumnCount = 0;

        foreach ($rows as $row) {
            $columnCount = count($row);
            if ($columnCount > $maxColumnCount)
                $maxColumnCount = $columnCount;
        }
        return $maxColumnCount;
    }

    public function createTemporaryTable($maxcolumnas ){
        Schema::create($this->tableName, function (Blueprint $table) use ($maxcolumnas) {
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
            for ($i = 9; $i < $maxcolumnas; $i++) {
                $table->string('campo' . $i-8)->nullable();
            }
            $table->timestamps();
        });
    }

    public function dropTemporaryTable()
    {
        Schema::dropIfExists($this->tableName);
        return response()->json(['message' => 'Temporary table dropped.']);
    }
}
