<div>

    <div class="">Selecciono el fichero</div>
    <div class="">
        <form wire:submit="import" class="ml-4" id="form_import" enctype="multipart/form-data">
        {{-- <form id="import" role="form" action="import()" enctype="multipart/form-data" > --}}
            <div class="">
                <div class="form-group col">
                    <label>Selecciona el fichero</label>
                    <input type="file" class="form-control form-control-sm" id="fichero" name="fichero" value=""/>
                </div>
            </div>
            <div class="mt-5 ">
                <x-secondary-button wire:click="volver()">
                    {{ __('Cancelar') }}
                </x-secondary-button>
                <x-button type="submit" class="bg-green-700 hover:bg-green-900" >
                    {{ __('Subir fichero') }}
                </x-button>
            </div>
        </form>
    </div>
    <div class="">Proceso el fichero</div>
    <div class="">Voy a resultado</div>

</div>
