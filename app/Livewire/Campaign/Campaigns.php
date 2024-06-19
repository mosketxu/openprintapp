<?php

namespace App\Livewire\Campaign;

use Livewire\Component;

class Campaigns extends Component
{
    public function render()
    {
        $campaigns=Campaigns::where('entidad_id',$)
        return view('livewire.campaign.campaigns');
    }
}
