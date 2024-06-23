<?php

namespace App\Livewire\Campaign;

use Livewire\Component;
use Livewire\WithFileUploads;

class Import extends Component
{
    use WithFileUploads;

    public $fichero;
    public $campaign;

    protected $rules = [
        'fichero' => 'required|mimes:xls,xlsx|max:12288',
    ];

    public function messages(){
        return [
            'fichero.required'=>'Debes seleccionar fichero.',
            'fichero.mime'=>'El fichero debe ser de Excel.',
            'fichero.max'=>'El fichero pesa demasiado. El máximo es 12 Mb.',
        ];
    }

    public function mount($campaign){
        $this->campaign=$campaign;
    }

    public function render()
    {
        return view('livewire.campaign.import');
    }

    public function updatedFichero(){
        $this->validate();
        $this->import();
    }

    function import() {
        $this->validate();

        DB::table('campaign_stores')

        $campcliente=$this->campaign->entidad_id;
        $campaignId=$this->campaign->id;

        $extension=$this->imagenelemento->getClientOriginalExtension();
        $tipo=$this->imagenelemento->getClientMimeType();
        $nombre=$this->imagenelemento->getClientOriginalName();
        $tamanyo=$this->imagenelemento->getSize();

        // Genero el nombre y la ruta que le pondré a la imagen
        $file_name=$nombre;
        $originalPath='storage/galeria/'.$campaignId.'/';


        // Si no existe la carpeta la creo
        // $ruta = public_path().'/galeria/'.$campaignId;
        if (!file_exists($originalPath)) {
            mkdir($originalPath, 0777, true);
            mkdir($originalPath.'/thumbnails', 0777, true);
        }
        // verifico si existe la imagen y la borro si existe. Busco el nombre que debería tener.
        $mi_imagen = public_path().$originalPath.$file_name;
        $mi_imagenthumb = public_path().$originalPath.'thumbnails/thumb_'.$file_name;
        if (@getimagesize($mi_imagen))  unlink($mi_imagen);
        if (@getimagesize($mi_imagenthumb)) unlink($mi_imagenthumb);

        // verifico que realmente llega un fichero
        if ($files=$this->imagenelemento) {
            // for save the original image
            $imageUpload=Image::make($files)->encode('jpg');
            // $originalPath='galeria/'.$campaignId.'/';
            $imageUpload->save($originalPath.$file_name);
            $this->campelemento->update([
                'imagen'=>$nombre,
            ]);
            //redimensionado
            Image::make($this->imagenelemento)
            ->resize(null, 144, function ($constraint) {
                $constraint->aspectRatio();
            })
                ->encode('jpg')
                ->save($originalPath.'thumbnails/thumb-'.$file_name);
        }
        dd('importo');

    }
}
