<div class="">
    <div class="h-full p-1 mx-2">
        <div class="flex">
            <div class="">
                <h1 class="text-2xl font-semibold text-gray-900">Elementos por tienda de la Campaña {{ $campaign->name }}</h1>
                <h2 class="text-xl font-semibold text-gray-900">Cliente {{ $campaign->entidad->entidad }}</h2>
            </div>
            <div class="ml-auto">
                <x-buttoncolor color='blue'  onclick="location.href = '{{ route('campaign.storeelementos',$campaign) }}'">{{ __('Elementos x Store') }}</x-buttoncolor>
                <x-buttoncolor color='orange'  onclick="location.href = '{{ route('campaign.elementosQ',$campaign) }}'">{{ __('Elementos de la campaña') }}</x-buttoncolor>
                <x-buttoncolor color='red'  onclick="location.href = '{{ route('campaign.etiquetaspdf',$campaign) }}'">{{ __('Etiquetas') }}</x-buttoncolor>

            </div>
        </div>
        <div class="">
            <div class="flex w-full py-2 pl-2 text-sm text-gray-500 bg-blue-100 rounded-t-md">
                <div class="w-1/12 pl-2 font-light " ><x-label>{{ __('Imagen') }}</x-label> </div>
                <div class="w-1/12 pl-2 font-light " ><x-label>{{ __('Campo1') }}</x-label> </div>
                <div class="w-1/12 pl-2 font-light " ><x-label>{{ __('Campo2') }}</x-label> </div>
                <div class="w-1/12 pl-2 font-light " ><x-label>{{ __('Campo3') }}</x-label> </div>
                <div class="w-1/12 pl-2 font-light " ><x-label>{{ __('Campo4') }}</x-label> </div>
                <div class="w-1/12 pl-2 font-light " ><x-label>{{ __('Campo5') }}</x-label> </div>
                <div class="w-1/12 pl-2 font-light " ><x-label>{{ __('Categoria') }}</x-label> </div>
                <div class="w-1/12 pl-2 font-light " ><x-label>{{ __('Archivo') }}</x-label> </div>
                <div class="w-1/12 pl-2 font-light " ><x-label>{{ __('Material') }}</x-label> </div>
                <div class="w-1/12 pl-2 font-light " ><x-label>{{ __('Medida') }}</x-label> </div>
                <div class="w-1/12 pl-2 font-light " ><x-label>{{ __('Idioma') }}</x-label> </div>
                <div class="w-1/12 pl-2 font-light " ><x-label>{{ __('Producto') }}</x-label> </div>
                <div class="w-1/12 pl-2 font-light " ><x-label>{{ __('Precio') }}</x-label> </div>
            </div>

            @forelse ($stores as $store)
            <div class="w-full ml-2 text-base hover:bg-red-100 ">{{ $store->store  }}
                @forelse($store->elementos as $elemento)
                <div class="flex items-center w-full text-sm text-gray-500 border-t-0 border-y hover:bg-blue-100 hover:cursor-pointer" wire:loading.class.delay="opacity-50" >
                    <div class="w-1/12 pr-2 "><x-inputbluetransparent type="text"  class="" value="{{ $elemento->imagen }}" readonly/></div>
                    <div class="w-1/12 pr-2 "><x-inputbluetransparent type="text"  class="" value="{{ $elemento->campo1 }}" readonly/></div>
                    <div class="w-1/12 pr-2 "><x-inputbluetransparent type="text"  class="" value="{{ $elemento->campo2 }}" readonly/></div>
                    <div class="w-1/12 pr-2 "><x-inputbluetransparent type="text"  class="" value="{{ $elemento->campo3 }}" readonly/></div>
                    <div class="w-1/12 pr-2 "><x-inputbluetransparent type="text"  class="" value="{{ $elemento->campo4 }}" readonly/></div>
                    <div class="w-1/12 pr-2 "><x-inputbluetransparent type="text"  class="" value="{{ $elemento->campo5 }}" readonly/></div>
                    <div class="w-1/12 pr-2 "><x-inputbluetransparent type="text"  class="" value="{{ $elemento->categoria }}" readonly/></div>
                    <div class="w-1/12 pr-2 "><x-inputbluetransparent type="text"  class="" value="{{ $elemento->archivo }}" readonly/></div>
                    <div class="w-1/12 pr-2 "><x-inputbluetransparent type="text"  class="" value="{{ $elemento->material }}" readonly/></div>
                    <div class="w-1/12 pr-2 "><x-inputbluetransparent type="text"  class="" value="{{ $elemento->medida }}" readonly/></div>
                    <div class="w-1/12 pr-2 "><x-inputbluetransparent type="text"  class="" value="{{ $elemento->idioma }}" readonly/></div>
                    <div class="w-1/12 pr-2 "><x-inputbluetransparent type="text"  class="" value="lista de productos" readonly/></div>
                    <div class="w-1/12 pr-2 "><x-inputbluetransparent type="text"  class="" value="precio" readonly/></div>
                </div>
                @empty
                <div class="flex items-center justify-center">
                    <x-icon.inbox class="w-8 h-8 text-gray-300"/><span class="py-5 text-xl font-medium text-gray-500">No se han encontrado datos...</span>
                </div>
                @endforelse
            </div>
            @empty
            <div class="flex items-center justify-center">
                <x-icon.inbox class="w-8 h-8 text-gray-300"/><span class="py-5 text-xl font-medium text-gray-500">No se han encontrado datos...</span>
            </div>
            @endforelse

        </div>
        <div class="mt-4">
            {{ $stores->links() }}
        </div>
    </div>
    <div class="m-3">
        <x-secondary-button  onclick="location.href = '{{ route('import.index',$campaign) }}'">{{ __('Volver') }}</x-secondary-button>
    </div>
</div>
