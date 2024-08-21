<?php

namespace App\Exports;

use App\Models\CampaignStoreElemento;
use Maatwebsite\Excel\Concerns\FromCollection,Maatwebsite\Excel\Concerns\WithHeadings;

class CampaignElementosQExport implements FromCollection,WithHeadings
{
    protected $elementos;
    protected $today;

    function __construct($elementos,$today) {
        $this->elementos = $elementos;
        $this->today = $today;
    }

    public function headings(): array{
        return [
            'campaign',
            'store',
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
            'producto',
            'preciocoste_ud',
            'created_at',
            'updated_at',
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->elementos;
    }
}
