<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;
    protected $fillable=['name','fechaini','fechafin','estado','fechainstal1','fechainstal2','fechainstal3','montaje1','montaje2','montaje3'];

    // public function stores(){return $this->hasMany(Store::class);}
    // public function campaignstores(){return $this->hasMany(CampaignStore::class);}
    // public function campaignelementos(){return $this->hasMany(CampaignElemento::class);}

    public function scopeSearch2($query, $busca){
        return $query->where('name', 'LIKE', "%$busca%")
        ->orWhere('fechaini', 'LIKE', "%$busca%")
        ->orWhere('fechaini', 'LIKE', "%$busca%")
        ->orWhere('estado', 'LIKE', "%$busca%")
        ;
    }

    public function getCampaignestadoAttribute(){
        return [
            '0'=>['text-blue-500','Creada'],
            '1'=>['text-yellow-500','Iniciada'],
            '2'=>['text-green-500','Finalizada'],
            '3'=>['text-red-500','Cancelada']
        ][$this->estado] ?? ['text-gray-100','Desconocido'];
    }

    public function getMonta1Attribute(){return ['D'=>'Desmontaje','M'=>'Montaje',][$this->montaje1] ?? '';}
    public function getMonta2Attribute(){return ['D'=>'Desmontaje','M'=>'Montaje',][$this->montaje2] ?? '';}
    public function getMonta3Attribute(){return ['D'=>'Desmontaje','M'=>'Montaje',][$this->montaje3] ?? '';}
}
