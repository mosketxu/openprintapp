<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignCabecera extends Model
{
    use HasFactory;

    protected $fillable=['campaign_id','campo0','campo1','campo2','campo3','campo4','campo5','campo6','campo7','campo8','campo9','campo10','elementificador','producto_id','preciocoste_ud','imagenelemento','bcampo0','bcampo1','bcampo2','bcampo3','bcampo4','bcampo5','bcampo6','bcampo7','bcampo8','bcampo9','bcampo10','bproducto','bpreciocoste','bimagenelemento'];

    public function campaign(){return $this->belongsTo(Campaign::class,'campaign','id');}

}
