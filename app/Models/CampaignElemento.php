<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignElemento extends Model
{
    use HasFactory;

    protected $fillable=['campaign_id','imagen','campo1','campo2','campo3','campo4','campo5','categoria','archivo','material','medida','elementificador','producto_id','preciocoste_ud','imagenelemento'];

    public function campaign(){return $this->belongsTo(Campaign::class,'campaign','id');}
    public function campaignStoreElementos(){return $this->hasMany(CampaignStoreElemento::class);}
    public function producto(){return $this->belongsTo(producto::class)->withDefault(['descripcion'=>'-']);}

    public function stores(){
            return $this->belongsToMany(CampaignStore::class, 'campaign_store_elementos')
                ->withPivot('cantidad')
                ->withTimestamps();
        }



}
