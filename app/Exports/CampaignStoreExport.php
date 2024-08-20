<?php

namespace App\Exports;

use App\Models\CampaignStore;
use Maatwebsite\Excel\Concerns\FromCollection,Maatwebsite\Excel\Concerns\WithHeadings;


class CampaignStoreExport implements FromCollection,WithHeadings
{
    protected $stores;
    protected $today;

    function __construct($stores,$today) {
        $this->stores = $stores;
        $this->today = $today;
    }

    public function headings(): array{
        return [
            'id',
            'campaign_id',
            'Cod',
            'Store',
            'Canal',
            'Dirección',
            'Población',
            'CP',
            'Provincia',
            'Teléfono',
            'Idioma',
            'Created_at',
            'Updated_at.',
        ];
    }


    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->stores;
    }
}
