<?php

namespace App\Exports;

use App\Models\CampaignElemento;
use Maatwebsite\Excel\Concerns\FromCollection,Maatwebsite\Excel\Concerns\WithHeadings;

class CampaignElementoExport implements FromCollection,WithHeadings
{

    protected $elementos;
    protected $today;

    function __construct($elementos,$today) {
        $this->elementos = $elementos;
        $this->today = $today;
    }

    public function headings(): array{
        return [
            'id',
            'campaign_id',
            'imagen',
            'campo1',
            'campo2',
            'campo3',
            'campo4',
            'campo5',
            'categoria',
            'archivo',
            'material',
            'medida',
            'idioma',
            'elementificador',
            'producto_id',
            'producto',
            'preciocoste_ud',
            'imagenelemento',
            'created_at',
            'updated_at.',
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->elementos;    }
}
