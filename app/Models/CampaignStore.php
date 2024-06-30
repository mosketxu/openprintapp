<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignStore extends Model
{
    use HasFactory;

    protected $fillable=['campaign_id','cod','store','canal','direccion','poblacion','cp','provincia','telefono','idioma'];

    public function campaign(){return $this->belongsTo(Campaign::class);}
    public function elementos(){
        return $this->belongsToMany(CampaignElemento::class, 'campaign_store_elementos')
            ->withPivot('cantidad')
            ->withTimestamps();
    }
    public function campaignStoreElementos(){return $this->hasMany(CampaignStoreElemento::class);}



}
