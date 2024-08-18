<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignStoreElemento extends Model
{
    use HasFactory;

    protected $fillable=['campaign_id','campaign_store_id','campaign_elemento_id','cantidad'];

    public function campaign(){return $this->belongsTo(Campaign::class);}
    public function campaignStore(){return $this->belongsTo(CampaignStore::class);}
    public function campaignElemento(){return $this->belongsTo(CampaignElemento::class);}
    // public function campaignElemento(){return $this->belongsTo(CampaignStoreElemento::class);}

}
