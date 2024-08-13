<div class="flex w-full">
    <div class="p-2 bg-blue-100 border border-blue-500 rounded-md w-ful lg:w-6/12">
        <h1 class="m-2 text-xl font-bold">Paso 1: Importar datos del fichero</h1>
        @if (!$campaign->fichero)
            <div class="">
                <h1 class="m-2 font-bold">Importar fichero</h1>
                <form id="formularioimport" class="text-sm " role="form" method="post" action="{{ route('import.import',$campaign) }}" enctype="multipart/form-data" >
                    @csrf
                    <div class="mx-2 form-group">
                        <label>Selecciona el fichero</label>
                        <input type="file" class="form-control form-control-sm" id="fichero" name="fichero" value=""/>
                    </div>
                    <x-buttoncolor type="submit" color='green' class="mt-10 w-80">{{ __('Subir Fichero') }}</x-buttoncolor>
                </form>
            </div>
        @else
        <div class="">
            <div class="p-2 m-2 border-2 border-blue-800 rounded-md">
                <div class="font-bold">Fichero importado:</div>
                <div class="px-1 font-bold text-white bg-black rounded-md">{{$campaign->fichero}}</div>
                <div class="px-1 font-bold rounded-md">Fecha/hora importación: {{ $fechaspain }}</div>
                <div class="my-2"><x-buttoncolor color='blue'  class=" w-80" onclick="location.href = '{{ route('campaign.datos',$campaign) }}'" >{{ __('Visualizar datos importados') }}</x-buttoncolor></div>
            </div>
            <div class="p-2 m-2 border-2 border-blue-800 rounded-md">
                <div class="text-red-500">Si desea importar un nuevo fichero tenga en cuenta que se borraran todos los datos de las tiendas y los productos generados en la primera ocasión</div>
                <div class="font-bold">Nuevo Fichero:</div>
                <form id="formularioimport" class="text-sm " role="form" method="post" action="{{ route('import.import',$campaign) }}" enctype="multipart/form-data" >
                    @csrf
                   <div class=" form-group">
                        <label>Selecciona el fichero</label>
                        <input type="file" class="form-control form-control-sm" id="fichero" name="fichero" value=""/>
                    </div>
                    <x-buttoncolor type="submit" color='green' class="mt-10 w-80">{{ __('Subir Fichero') }}</x-buttoncolor>
                </form>
            </div>
        </div>
        @endif
    </div>
    <div class="p-2 bg-blue-100 border border-blue-500 rounded-md w-ful lg:w-6/12">
        <h1 class="m-2 text-xl font-bold">Paso 2: Procesar datos</h1>
        @if($campaign->estadoproceso<1)
            <div class="p-2 text-red-500">
                Hay que ejecutar primero el Paso 1
            </div>
        @else
            <form wire:submit.prevent="stores" class="">
                <x-buttoncolor type="submit" color="green" class="m-2 w-80" >{{ __('Procesar') }}</x-buttoncolor>
            </form>

            @if($campaign->estadoproceso>1)
            <div class="p-2 m-2 border-2 border-blue-800 rounded-md">
                @if($campaign->estadoproceso>1)
                <div class=""><x-buttoncolor color='yellow'  class="m-2 w-80" onclick="location.href = '{{ route('campaign.stores',$campaign) }}'" >{{ __('Lista de stores') }}</x-buttoncolor></div>
                @endif
                @if($campaign->estadoproceso>2)
                <div class=""><x-buttoncolor color='gray'  class="m-2 w-80" onclick="location.href = '{{ route('campaign.elementos',$campaign) }}'" >{{ __('Lista de elementos') }}</x-buttoncolor></div>
                <div class=""><x-buttoncolor color='orange'  class="m-2 w-80" onclick="location.href = '{{ route('campaign.storeelementos',$campaign) }}'" >{{ __('Detalle Pedido') }}</x-buttoncolor></div>
                @endif
            </div>
            @endif
        @endif
    </div>
</div>
