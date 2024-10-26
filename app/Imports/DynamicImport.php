<?php

namespace App\Imports;

use App\Models\Campaign;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Support\Facades\DB;
use PDOException;

class   DynamicImport implements ToCollection
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

        try {

            DB::beginTransaction();

            $maxcolumnas=$this->maxcolumna($rows);

            if(Schema::hasTable($this->tableName))
            $this->dropTemporaryTable();

        // Intentar crear la tabla temporal
            try {
                $this->createTemporaryTable($maxcolumnas);
            } catch (PDOException $e) {
                // Ignorar errores de tipo PDOException
                \Log::warning('PDOException ignorada durante la creación de la tabla: ' . $e->getMessage());
            } catch (\Exception $e) {
                // Manejar cualquier otro tipo de error
                \Log::error('Error al crear la tabla temporal: ' . $e->getMessage());
                throw $e;
            }

            $posicionCod=0;
            $encontradoCod="0";
            foreach ($rows as $row) {
                $rowArray = $row->toArray();
                $dataToInsert = [];
                if($encontradoCod==0)
                    if(strtoupper($rowArray[0])!='COD')
                        $posicionCod++;
                    else
                        $encontradoCod=1;
                // dd($rowArray[0]);
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
                // $dataToInsert['campo100']= '50';
                DB::table($this->tableName)->insert($dataToInsert);
            }

            $campaign=Campaign::find($this->tableName);
            $campaign->numcolumnas=$maxcolumnas;
            $campaign->filacod=$posicionCod;
            // dd($campaign);
            $campaign->save();

            DB::commit();

        } catch (\Exception $e) {
            DB::rollback();
            \Log::error('Error durante la importación de datos: ' . $e->getMessage());
            throw $e; // Re-lanzar la excepción para manejarla en el controlador
        }


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
                $table->string('campo' . $i-8,10)->nullable();
            }
            $table->timestamps();
        });
    }

    public function dropTemporaryTable()
    {
        Schema::dropIfExists($this->tableName);
        return response()->json(['message' => 'Temporary table dropped.']);
    }

    public function chunkSize(): int
    {
        return 300; // Ajusta el tamaño del chunk según tus necesidades
    }
}
