<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;
    protected $fillable=['entidad_id','name','fechainicio','fechafin','estado','fechainstal1','fechainstal2','fechainstal3','montaje1','montaje2','montaje3'];

    public function cliente(){return $this->belongsTo(Entidad::class,'entidad_id','id')->withDefault(['entidad'=>'Grafitex']);}
    public function campaignstores(){return $this->hasMany(CampaignStore::class);}
    public function campaignelementos(){return $this->hasMany(CampaignElemento::class);}

    public function scopeSearch2($query, $busca){
        return $query->where('name', 'LIKE', "%$busca%")
        ->orWhere('fechaini', 'LIKE', "%$busca%")
        ->orWhere('fechaini', 'LIKE', "%$busca%")
        ->orWhere('estado', 'LIKE', "%$busca%")
        ;
    }

    public function getCampestadoAttribute(){
        return [
            '0'=>['text-blue-500','Creada'],
            '1'=>['text-yellow-500','Iniciada'],
            '2'=>['text-green-500','Finalizada'],
            '3'=>['text-red-500','Cancelada']
        ][$this->estado] ?? ['text-gray-100','Desconocido'];
    }

    // public function getFini(){return $this->fechainicio->format('d/m/Y') ?? '';}

    public function getFiniAttribute(){return $this->fechainicio ? Carbon::parse($this->fechinicio)->format('d-m-Y') : '';}
    public function getFfinAttribute(){return $this->fechainicio ? Carbon::parse($this->fechifin)->format('d-m-Y') : '';}
    public function getFinst1Attribute(){return $this->fechainstal1 ? Carbon::parse($this->fechainstal1)->format('d-m-Y') : '';}
    public function getFinst2Attribute(){return $this->fechainstal2 ? Carbon::parse($this->fechainstal2)->format('d-m-Y') : '';}
    public function getFinst3Attribute(){return $this->fechainstal3 ? Carbon::parse($this->fechainstal3)->format('d-m-Y') : '';}


    public function getMonta1Attribute(){return ['D'=>'Desmontaje','M'=>'Montaje',][$this->montaje1] ?? '';}
    public function getMonta2Attribute(){return ['D'=>'Desmontaje','M'=>'Montaje',][$this->montaje2] ?? '';}
    public function getMonta3Attribute(){return ['D'=>'Desmontaje','M'=>'Montaje',][$this->montaje3] ?? '';}
}
