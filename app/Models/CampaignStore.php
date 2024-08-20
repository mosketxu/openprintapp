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

    function producto(){
        return $this->hasManyThrough(
            Producto::class,   // Modelo final al que se quiere acceder
            CampaignStoreElemento::class,   // Modelo intermedio
            'campaign_store_id',        // Clave foránea en la tabla intermedia (elementos) hacia la tabla principal (stores)
            'id',              // Clave foránea en la tabla final (productos) que se refiere a la tabla intermedia (elementos)
            'id',              // Clave primaria local en la tabla principal (stores)
            'campaign_elemento_id'      // Clave foránea local en la tabla intermedia (elementos) que se refiere a la tabla final (productos)
        );
    }

}
