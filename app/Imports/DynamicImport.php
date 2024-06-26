<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

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
    public function collection(Collection $rows)
    {
        $columnas=count($rows)-8;
        dd($columnas);
        if(!Schema::hasTable($this->tableName))
            $this->createTemporaryTable($columnas,$this->tableName);

        // Insertar los datos en la tabla
        foreach ($rows as $row) {
            \DB::table($this->tableName)->insert($row->toArray());
        }
    }

    public function createTemporaryTable($columns, $campaignId){
        Schema::create($campaignId, function (Blueprint $table) use ($columns) {
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
            for ($i=1; $i < $columns; $i++) {
                $table->string('campo'. $i);
            }
            $table->timestamps();
        });
    }
}
