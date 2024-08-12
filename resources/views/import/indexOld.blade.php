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
                        </div>
                    </div>
                    @endcan
                </div>
                <div class="w-full space-y-2 lg:flex lg:space-x-2 lg:space-y-0">
                    <div class="p-2 bg-blue-100 border border-blue-500 rounded-md w-ful lg:w-4/12">
                        <h1 class="m-2 font-bold">Paso 1: Importar datos del fichero</h1>
                        <form id="formularioimport" class="text-sm " role="form" method="post" action="{{ route('import.import',$campaign) }}" enctype="multipart/form-data" >
                            @csrf
                            <div class="mx-2 mt-10 form-group">
                                <label>Selecciona el fichero</label>
                                <input type="file" class="form-control form-control-sm" id="fichero" name="fichero" value=""/>
                            </div>
                            <x-buttoncolor type="submit" color='green' class="mt-10 w-80">{{ __('Subir Fichero') }}</x-buttoncolor>
                        </form>
                        Estado: {{$campaign->estadoproceso}}
                    </div>
                    <div class="p-2 bg-blue-100 border border-blue-500 rounded-md w-ful lg:w-4/12">
                        <h1 class="m-2 font-bold">Paso 2: Importar datos store</h1>
                        <form id="formularioimportstores" class="text-sm" role="form" method="post" action="{{ route('import.stores',$campaign) }}" >
                            @csrf
                            <x-buttoncolor type="submit" color="green" class="mt-10 w-80" >{{ __('Procesar Stores') }}</x-buttoncolor>
                        </form>
                        @if($campaign->estadoproceso>1)
                        <x-buttoncolor color='yellow'  class="my-2 w-80" onclick="location.href = '{{ route('campaign.stores',$campaign) }}'" >{{ __('Lista de stores') }}</x-buttoncolor>
                        @endif
                        <div class="">
                            Estado: {{$campaign->estadoproceso}}
                        </div>
                    </div>
                    <div class="p-2 bg-blue-100 border border-blue-500 rounded-md w-ful lg:w-4/12">
                        <h1 class="my-2 font-bold">Paso 3: Importar datos productos</h1>
                        <form id="formularioimportelementos" class="text-sm" role="form" method="post" action="{{ route('import.elementos',$campaign) }}" >
                            @csrf
                            <x-buttoncolor type="submit" color='green' class="mt-10 w-80" >{{ __('Procesar Elementos') }}</x-buttoncolor>
                        </form>
                        @if($campaign->estadoproceso>2)
                            <div class="">
                                <x-buttoncolor color='gray'  class="my-2 w-80" onclick="location.href = '{{ route('campaign.elementos',$campaign) }}'" >{{ __('Lista de elementos') }}</x-buttoncolor>
                            </div>
                            <div class="">
                                <x-buttoncolor color='orange'  class="mb-2 w-80" onclick="location.href = '{{ route('campaign.storeelementos',$campaign) }}'" >{{ __('Detalle Pedido') }}</x-buttoncolor>
                            </div>
                        @endif
                        <div class="">Estado: {{$campaign->estadoproceso}}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="m-3">
            <x-secondary-button  onclick="location.href = '{{ route('campaign.edit',$campaign) }}'">{{ __('Volver') }}</x-secondary-button>
        </div>
    </div>
</x-app-layout>
