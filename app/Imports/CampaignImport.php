<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
// use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DynamicImport implements ToCollection,
{

    protected $campaignId;

    public function __construct($campaignId)
    {
        $this->campaignId = $campaignId;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $columnas=count($row)-8;
        if(!Schema::hasTable($this->campaignId))
            $this->createTemporaryTable($columnas,$this->campaignId);

            return new Campaign([
            //
        ]);
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
