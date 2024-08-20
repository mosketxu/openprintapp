<?php

namespace App\Livewire\Campaign;

use App\Models\Campaign;
use App\Models\CampaignStore;
use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\CampaignStoreExport;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;


class CampaignStores extends Component
{
    use WithPagination;

    public $search='';
    public $campaign;

    function mount(Campaign $campaign){
        $this->campaign=$campaign;
    }

    public function render(){

        $stores=CampaignStore::query()
        ->when($this->search!='',function($query) {return $query->where('store','LIKE','%'.$this->search.'%');})
        ->where('campaign_id',$this->campaign->id)
        ->paginate(15);
        // ->get();

        return view('livewire.campaign.campaign-stores', compact('stores'));
    }

    public function storesXls() {
        $stores=CampaignStore::where('campaign_id',$this->campaign->id)->get();
        $today=Carbon::now()->format('d/m/Y');
        return Excel::download(new CampaignStoreExport($stores,$today), 'stores'.$this->campaign->id.'.xlsx');
    }
}
