<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignElemento extends Model
{
    use HasFactory;

    protected $fillable=['campaign_id','imagen','campo1','campo2','campo3','campo4','campo5','categoria','archivo','material','medida','elementificador'];

    public function campaign(){return $this->belongsTo(Campaign::class,'campaign','id');}

}
