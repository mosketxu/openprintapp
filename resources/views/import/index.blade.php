<x-app-layout>
    <div class="">
        <div class="h-full p-1 mx-2">
            <h1 class="text-2xl font-semibold text-gray-900">Importación de datos
            </h1>
            <div class="py-1 space-y-4">
                <div class="">
                    @include('errores')
                </div>
                <div class="flex justify-between">
                    <div class="flex w-10/12 space-x-3">
                        filtrod
                        {{-- @include('campaign.campaignfilters') --}}
                    </div>
                    @can('campaign.create')
                    <div class="flex flex-row-reverse w-2/12">
                        <div class="pt-3">
                            botones
                            {{-- <x-buttonblue  onclick="location.href = '{{ route('campaign.create') }}'" color="blue">{{ __('Nueva') }}</x-buttonblue> --}}
                        </div>
                    </div>
                    @endcan
                </div>

                <div class="">
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
            </div>
        </div>
    </div>
</x-app-layout>
