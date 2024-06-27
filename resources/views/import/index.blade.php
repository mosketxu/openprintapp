<x-app-layout>
    <div class="">
        <div class="h-full p-1 mx-2">
            <h1 class="text-2xl font-semibold text-gray-900">Importación de datos para la campaña: {{$campaign->name}}
            </h1>
                <div class="">
                    @include('error')
                </div>
                <div class="flex justify-between">
                    <div class="flex w-10/12 space-x-3">
                        {{-- @include('campaign.campaignfilters') --}}
                    </div>
                    @can('campaign.create')
                    <div class="flex flex-row-reverse w-2/12">
                        <div class="pt-3">
                            {{-- <x-buttonblue  onclick="location.href = '{{ route('campaign.create') }}'" color="blue">{{ __('Nueva') }}</x-buttonblue> --}}
                        </div>
                    </div>
                    @endcan
                </div>

                <div class="flex">
                    <div class="p-2 bg-blue-100 border border-blue-500 rounded-md">
                        <h1 class="my-2 font-bold">Paso 1: Importar datos del fichero</h1>
                        <form id="formularioimport" class="text-sm" role="form" method="post" action="{{ route('import.import',$campaign) }}" enctype="multipart/form-data" >
                            @csrf
                            <div class="row">
                                <div class="form-group col">
                                    <label>Selecciona el fichero</label>
                                    <input type="file" class="form-control form-control-sm" id="fichero" name="fichero" value=""/>
                                </div>
                            </div>
                            <div class="mt-5 ">
                                <x-button type="submit" class="bg-green-700 hover:bg-green-900" >
                                    {{ __('Subir Fichero') }}
                                </x-button>
                            </div>
                        </form>
                        <div class="">
                            Estado: {{$campaign->estadoproceso}}
                        </div>
                    </div>
                    <div class="p-2 bg-blue-100 border border-blue-500 rounded-md">
                        <h1 class="my-2 font-bold">Paso 2: Importar datos tienda</h1>
                        <form id="formularioimporttiendas" class="text-sm" role="form" method="post" action="{{ route('import.tiendas',$campaign) }}" >
                            @csrf
                            <div class="mt-5 ">
                                <x-button type="submit" class="bg-green-700 hover:bg-green-900" >
                                    {{ __('Procesar Tiendas') }}
                                </x-button>
                            </div>
                        </form>
                        <div class="">
                            Estado: {{$campaign->estadoproceso}}
                        </div>
                    </div>
                    <div class="p-2 bg-blue-100 border border-blue-500 rounded-md">
                        <h1 class="my-2 font-bold">Paso 3: Importar datos productos</h1>
                    </div>
                    <div class="p-2 bg-blue-100 border border-blue-500 rounded-md">
                        <h1 class="my-2 font-bold">Paso 4: Importar datos campaña</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
