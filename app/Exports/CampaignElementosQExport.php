<?php

namespace App\Exports;

use App\Models\CampaignStoreElemento;
use Maatwebsite\Excel\Concerns\FromCollection;

class CampaignElementosQExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CampaignStoreElemento::all();
    }
}
