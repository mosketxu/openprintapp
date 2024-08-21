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

    // function producto(){
    //     return $this->hasManyThrough(
    //         Producto::class,            // Modelo final al que se quiere acceder
    //         CampaignElemento::class,    // Modelo intermedio
    //         'campaign_elemento_id',     // Clave foránea en la tabla intermedia (elementos) hacia la tabla principal (stores)
    //         'id',                       // Clave foránea en la tabla final (productos) que se refiere a la tabla intermedia (elementos)
    //         'id',                       // Clave primaria local en la tabla principal (stores)
    //         'campaign_elemento_id'      // Clave foránea local en la tabla intermedia (elementos) que se refiere a la tabla final (productos)
    //     );
    // }


}
