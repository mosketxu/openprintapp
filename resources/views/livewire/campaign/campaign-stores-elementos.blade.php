<div class="">
    <div class="p-1 mx-2">
        <div class="flex p-1 mx-2">
            <div class="">
                <h1 class="text-2xl font-semibold text-gray-900">Elementos por tienda</h1>
                <h2 class="text-xl font-semibold text-gray-900">Campaña: {{$campaign->name}}</h2>
                <h2 class="text-lg font-semibold text-gray-900">Cliente: {{$campaign->entidad->entidad}}</h2>
            </div>
            @if($campaign->id)
            @include('campaign.acciones')
            @endif
        </div>
        <div class="">
            <div class="flex w-full py-2 pl-2 text-sm text-gray-500 bg-blue-100 rounded-t-md">
                @if($bcampo0==true)
                <div class="w-1/12 pl-2 font-light " ><x-label>{{ __('Imagen') }}</x-label> </div>
                @endif
                @if($bcampo1==true)
                <div class="w-1/12 pl-2 font-light " ><x-label>{{ __('Campo1') }}</x-label> </div>
                @endif
                @if($bcampo2==true)
                <div class="w-1/12 pl-2 font-light " ><x-label>{{ __('Campo2') }}</x-label> </div>
                @endif
                @if($bcampo3==true)
                <div class="w-1/12 pl-2 font-light " ><x-label>{{ __('Campo3') }}</x-label> </div>
                @endif
                @if($bcampo4==true)
                <div class="w-1/12 pl-2 font-light " ><x-label>{{ __('Campo4') }}</x-label> </div>
                @endif
                @if($bcampo5==true)
                <div class="w-1/12 pl-2 font-light " ><x-label>{{ __('Campo5') }}</x-label> </div>
                @endif
                @if($bcampo6==true)
                <div class="w-1/12 pl-2 font-light " ><x-label>{{ __('Categoria') }}</x-label> </div>
                @endif
                @if($bcampo7==true)
                <div class="w-1/12 pl-2 font-light " ><x-label>{{ __('Archivo') }}</x-label> </div>
                @endif
                @if($bcampo8==true)
                <div class="w-1/12 pl-2 font-light " ><x-label>{{ __('Material') }}</x-label> </div>
                @endif
                @if($bcampo9==true)
                <div class="w-1/12 pl-2 font-light " ><x-label>{{ __('Medida') }}</x-label> </div>
                @endif
                @if($bcampo10==true)
                <div class="w-1/12 pl-2 font-light " ><x-label>{{ __('Idioma') }}</x-label> </div>
                @endif
                @if($bproducto==true)
                <div class="w-1/12 pl-2 font-light " ><x-label>{{ __('Producto') }}</x-label> </div>
                @endif
                @if($bpreciocoste==true)
                <div class="w-1/12 pl-2 font-light " ><x-label>{{ __('Precio') }}</x-label> </div>
                @endif
                <div class="w-1/12 pl-2 font-light " ><x-label>{{ __('Cantidad') }}</x-label> </div>
                <div class="w-1/12 pl-2 font-light " ><x-label>{{ __('Imagen') }}</x-label> </div>
            </div>

            @forelse ($stores as $campstoreelem)
            <div class="w-full ml-2 text-base hover:bg-red-100 ">{{ $campstoreelem->campaignStore->cod  }} - {{ $campstoreelem->campaignStore->store  }}
                {{-- @forelse($campstoreelem as $elemento) --}}
                <div class="flex items-center w-full text-sm text-gray-500 border-t-0 border-y hover:bg-blue-100 hover:cursor-pointer"
                    onclick="location.href = '{{ route('campaignelemento.edit',$campstoreelem) }}'"
                    wire:loading.class.delay="opacity-50" >
                    @if($bcampo0==true)
                    <div class="w-1/12 pr-2 "><x-inputbluetransparent type="text"  class="" value="{{ $campstoreelem->campaignElemento->imagen }}" readonly/></div>
                    @endif
                    @if($bcampo1==true)
                    <div class="w-1/12 pr-2 "><x-inputbluetransparent type="text"  class="" value="{{ $campstoreelem->campaignElemento->campo1 }}" readonly/></div>
                    @endif
                    @if($bcampo2==true)
                    <div class="w-1/12 pr-2 "><x-inputbluetransparent type="text"  class="" value="{{ $campstoreelem->campaignElemento->campo2 }}" readonly/></div>
                    @endif
                    @if($bcampo3==true)
                    <div class="w-1/12 pr-2 "><x-inputbluetransparent type="text"  class="" value="{{ $campstoreelem->campaignElemento->campo3 }}" readonly/></div>
                    @endif
                    @if($bcampo4==true)
                    <div class="w-1/12 pr-2 "><x-inputbluetransparent type="text"  class="" value="{{ $campstoreelem->campaignElemento->campo4 }}" readonly/></div>
                    @endif
                    @if($bcampo5==true)
                    <div class="w-1/12 pr-2 "><x-inputbluetransparent type="text"  class="" value="{{ $campstoreelem->campaignElemento->campo5 }}" readonly/></div>
                    @endif
                    @if($bcampo6==true)
                    <div class="w-1/12 pr-2 "><x-inputbluetransparent type="text"  class="" value="{{ $campstoreelem->campaignElemento->categoria }}" readonly/></div>
                    @endif
                    @if($bcampo7==true)
                    <div class="w-1/12 pr-2 "><x-inputbluetransparent type="text"  class="" value="{{ $campstoreelem->campaignElemento->archivo }}" readonly/></div>
                    @endif
                    @if($bcampo8==true)
                    <div class="w-1/12 pr-2 "><x-inputbluetransparent type="text"  class="" value="{{ $campstoreelem->campaignElemento->material }}" readonly/></div>
                    @endif
                    @if($bcampo9==true)
                    <div class="w-1/12 pr-2 "><x-inputbluetransparent type="text"  class="" value="{{ $campstoreelem->campaignElemento->medida }}" readonly/></div>
                    @endif
                    @if($bcampo10==true)
                    <div class="w-1/12 pr-2 "><x-inputbluetransparent type="text"  class="" value="{{ $campstoreelem->campaignElemento->idioma }}" readonly/></div>
                    @endif
                    @if($bproducto==true)
                    <div class="w-1/12 pr-2 "><x-inputbluetransparent type="text"  class="" value="{{ $campstoreelem->campaignElemento->producto->descripcion ?? '-' }}" readonly/></div>
                    @endif
                    @if($bpreciocoste==true)
                    <div class="w-1/12 pr-2 "><x-inputbluetransparent type="text"  class="" value="{{ $campstoreelem->campaignElemento->preciocoste_ud }}" readonly/></div>
                    @endif
                    <div class="w-1/12 pr-2 "><x-inputbluetransparent type="text"  class="" value="{{ $campstoreelem->cantidad }}" readonly/></div>
                    <div class="w-1/12 pr-2 ">
                        @if(file_exists( 'storage/galeria/'.$campaign->id.'/thumbnails/thumb-'.$campstoreelem->campaignElemento->imagenelemento ))
                            <label for="file{{ $campstoreelem->campaignElemento->id }}" >
                                <img src="{{asset('storage/galeria/'.$campaign->id.'/thumbnails/thumb-'.$campstoreelem->campaignElemento->imagenelemento.'?'.time())}}" alt={{$campstoreelem->campaignElemento->imagenelemento}} title={{$campstoreelem->campaignElemento->imagenelemento}}
                                class="h-10 mx-auto"/>
                            </label>
                        @else
                            <label for="file{{ $campstoreelem->campaignElemento->id }}" >
                                <img src="{{asset('storage/galeria/pordefecto.jpg')}}" alt={{$campstoreelem->campaignElemento->imagenelemento}} title={{$campstoreelem->campaignElemento->imagenelemento}}
                                class="h-10 mx-auto"/>
                            </label>
                        @endif
                    </div>
                </div>
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
