<?php

namespace App\Exports;

use App\Models\CampaignStoreElemento;
use Maatwebsite\Excel\Concerns\FromCollection,Maatwebsite\Excel\Concerns\WithHeadings;

class CampaignElementosQExport implements FromCollection,WithHeadings
{
    protected $elementos;
    protected $salida;
    protected $today;
    protected $cabecera;
    public $campo0;
    public $campo1;
    public $campo2;
    public $campo3;
    public $campo4;
    public $campo5;
    public $campo6;
    public $campo7;
    public $campo8;
    public $campo9;
    public $campo10;
    public $elementificador;
    public $producto_id;
    public $preciocoste_ud;
    public $imagenelemento;
    public $bcampo0;
    public $bcampo1;
    public $bcampo2;
    public $bcampo3;
    public $bcampo4;
    public $bcampo5;
    public $bcampo6;
    public $bcampo7;
    public $bcampo8;
    public $bcampo9;
    public $bcampo10;
    public $bproducto;
    public $bpreciocoste;
    public $bimagenelemento;

    function __construct($elementos,$today,$salida,$cabecera) {
        $this->elementos = $elementos;
        $this->today = $today;
        $this->salida = $salida;
        $this->cabecera = $cabecera;
        $this->campo0=$cabecera->campo0;
        $this->campo1=$cabecera->campo1;
        $this->campo2=$cabecera->campo2;
        $this->campo3=$cabecera->campo3;
        $this->campo4=$cabecera->campo4;
        $this->campo5=$cabecera->campo5;
        $this->campo6=$cabecera->campo6;
        $this->campo7=$cabecera->campo7;
        $this->campo8=$cabecera->campo8;
        $this->campo9=$cabecera->campo9;
        $this->campo10=$cabecera->campo10;
        $this->elementificador=$cabecera->elementificador;
        $this->producto_id=$cabecera->producto_id;
        $this->preciocoste_ud=$cabecera->preciocoste_ud;
        $this->imagenelemento=$cabecera->imagenelemento;
        $this->bcampo0=$cabecera->bcampo0==1 ? true : false;
        $this->bcampo1=$cabecera->bcampo1==1 ? true : false;
        $this->bcampo2=$cabecera->bcampo2==1 ? true : false;
        $this->bcampo3=$cabecera->bcampo3==1 ? true : false;
        $this->bcampo4=$cabecera->bcampo4==1 ? true : false;
        $this->bcampo5=$cabecera->bcampo5==1 ? true : false;
        $this->bcampo6=$cabecera->bcampo6==1 ? true : false;
        $this->bcampo7=$cabecera->bcampo7==1 ? true : false;
        $this->bcampo8=$cabecera->bcampo8==1 ? true : false;
        $this->bcampo9=$cabecera->bcampo9==1 ? true : false;
        $this->bcampo10=$cabecera->bcampo10==1 ? true : false;
        $this->bproducto=$cabecera->bproducto==1 ? true :false;
        $this->bpreciocoste=$cabecera->bpreciocoste==1 ? true :false;
        $this->bimagenelemento=$cabecera->bimagenelemento==1 ? true :false;
    }

    public function headings(): array{

        // Headers fijos al inicio
        $headers = ['Campaña'];


        // Headers condicionales
        if ($this->salida == 'constore') {$headers[] = 'Store';}
        if ($this->bcampo0 == true) {$headers[] = $this->campo0;};
        if ($this->bcampo1 == true) {$headers[] = $this->campo1;};
        if ($this->bcampo2 == true) {$headers[] = $this->campo2;};
        if ($this->bcampo3 == true) {$headers[] = $this->campo3;};
        if ($this->bcampo4 == true) {$headers[] = $this->campo4;};
        if ($this->bcampo5 == true) {$headers[] = $this->campo5;};
        if ($this->bcampo6 == true) {$headers[] = $this->campo6;};
        if ($this->bcampo7 == true) {$headers[] = $this->campo7;};
        if ($this->bcampo8 == true) {$headers[] = $this->campo8;};
        if ($this->bcampo9 == true) {$headers[] = $this->campo9;};
        if ($this->bcampo10 == true) {$headers[] = $this->campo10;};
        if ($this->bproducto == true) {$headers[] = $this->producto_id;};
        if ($this->bpreciocoste == true) {$headers[] = $this->preciocoste_ud;};
        if ($this->bimagenelemento == true) {$headers[] = $this->imagenelemento;};


        // Headers fijos al final
        $headers = array_merge($headers, ['Cantidad','Created_at','Updated_at']);

        return $headers;

    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->elementos;
    }
}
