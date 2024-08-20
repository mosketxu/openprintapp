<?php

namespace App\Livewire\Campaign;

use App\Models\Campaign;
use App\Models\CampaignElemento;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Laravel\Facades\Image;
// use Image;


class CampaignGaleria extends Component
{
    use WithFileUploads;


    public $campelemento;
    public $campaign;
    public $imagenelemento;
    public $ruta;
    public $altura;
    public $isLoading = false;

    protected $rules = [
        'imagenelemento' => 'image|mimes:pdf,jpeg,png,jpg,gif,svg|max:12288',
    ];

    public function messages(){
        return [
            // 'imagenelemento.required'=>'Debes seleccionar una imagen.',
            'imagenelemento.mimes'=>'El tipo de archivo no es correcto',
            'imagenelemento.image'=>'El tipo de archivo no es correcto',
            'imagenelemento.max'=>'El tamaño maximo es 12Mb',
        ];
    }

    function mount(Campaign $campaign, CampaignElemento $elemento){
        $this->campaign=$campaign;
        $this->campelemento=$elemento;
        if(Route::currentRouteName()=='campaign.edit'){
            $this->ruta='storage/galeria/'.$campaign->id.'/'.$elemento->imagenelemento;
            $this->altura='40';
        }else{
            $this->ruta='storage/galeria/'.$campaign->id.'/thumbnails/thumb-'.$elemento->imagenelemento;
            $this->altura='10';
        }
    }

    public function render(){
        // dd('asd');
        return view('livewire.campaign.campaign-galeria');
    }

    public function updatedImagenelemento(){
        $this->validate();
        $this->saveimg();
    }

    public function saveimg(){

        $this->isLoading = true;

        // $campElem=CampaignElemento::find($this->campelemento->elementoId);
        // $tienda=CampaignTienda::find($this->campelemento->tienda_id);
        // $campaignId=$this->campaign->id;

        $extension=$this->imagenelemento->getClientOriginalExtension();
        $tipo=$this->imagenelemento->getClientMimeType();
        $nombre=$this->imagenelemento->getClientOriginalName();
        $tamanyo=$this->imagenelemento->getSize();


        // Genero el nombre y la ruta que le pondré a la imagen
        $file_name=$nombre;
        $originalPath='storage/galeria/'.$this->campaign->id.'/';

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
            $imageUpload=Image::read($this->imagenelemento);
            $imageUpload->encodeByExtension('jpg');

            $destinationPath = public_path($originalPath);
            $imageUpload->save($destinationPath.$nombre);

            // Generate Thumbnail Image Upload on Folder Code
            $destinationPathThumbnail = public_path($originalPath).'thumbnails/thumb-';
            $imageUpload->scaleDown(width: 200);
            $imageUpload->save($destinationPathThumbnail.$nombre);

            $this->campelemento->update([
                'imagenelemento'=>$nombre,
            ]);

            $mensaje="Actualizado";
            $this->dispatch('notify', $mensaje);
            $this->isLoading = false;
        }
    }

    public function cargar()
    {
        $this->isLoading = true;

        // Simular una carga con un retraso
        sleep(3); // Aquí puedes realizar la operación real, como una API call, consulta a BD, etc.

        $this->isLoading = false;
    }

}
