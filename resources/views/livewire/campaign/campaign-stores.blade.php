<div class="">
    <div class="h-full p-1 mx-2">
        <h1 class="text-2xl font-semibold text-gray-900">Stores de la Campaña: {{$campaign->name}} del cliente {{$campaign->entidad->entidad}}</h1>
        <div class="py-1 space-y-4">
            {{-- <div class="">
                @include('errores')
            </div> --}}
            <div class="flex justify-between">
                <div class="flex w-10/12 space-x-3">
                    @include('campaign.campaignstoresfilters')
                </div>
            </div>
            <div class="">
                <div class="flex w-full py-2 pl-2 text-sm text-gray-500 bg-blue-100 rounded-t-md">
                    <div class="w-1/12 pl-2 font-light lg:w-1/12 lg:flex " ><x-label>{{ __('Cod') }}</x-label> </div>
                    <div class="w-3/12 pl-2 font-light lg:w-1/12 lg:flex " ><x-label>{{ __('Store') }}</x-label></div>
                    <div class="hidden pl-2 font-light lg:w-1/12 lg:flex " ><x-label>{{ __('Canal') }}</x-label></div>
                    <div class="w-4/12 pl-2 font-light lg:w-2/12 lg:flex " ><x-label>{{ __('Dirección') }}</x-label></div>
                    <div class="w-2/12 pl-2 font-light lg:w-1/12 lg:flex " ><x-label>{{ __('Población') }}</x-label></div>
                    <div class="w-1/12 pl-2 font-light lg:w-1/12 lg:flex " ><x-label>{{ __('C.P.') }}</x-label></div>
                    <div class="hidden pl-2 font-light lg:w-1/12 lg:flex " ><x-label>{{ __('Provincia') }}</x-label></div>
                    <div class="w-1/12 pl-2 font-light lg:w-1/12 lg:flex " ><x-label>{{ __('Tfno.') }}</x-label></div>
                    <div class="hidden pl-2 font-light lg:w-1/12 lg:flex " ><x-label>{{ __('Idioma') }}</x-label></div>
                    <div class="hidden pl-2 font-light lg:w-1/12 lg:flex " ><x-label>{{ __('Creada') }}</x-label></div>
                    <div class="hidden pl-2 font-light lg:w-1/12 lg:flex " ><x-label>{{ __('Actualizada') }}</x-label></div>
                </div>
                @forelse ($stores as $store)

                <div class="flex items-center w-full text-sm text-gray-500 border-t-0 border-y hover:bg-gray-100 hover:cursor-pointer"
                    {{-- onclick="location.href = '{{ route('campaign.edit',$campaign) }}'" --}}
                    wire:loading.class.delay="opacity-50" >
                    <div class="w-1/12 pl-2 font-light lg:w-1/12 lg:flex " ><x-inputbluetransparent type="text"  class="" value="{{ $store->cod }}" readonly/></div>
                    <div class="w-3/12 pl-2 font-light lg:w-1/12 lg:flex " ><x-inputbluetransparent type="text"  class="" value="{{ $store->store }}" readonly/></div>
                    <div class="hidden pl-2 font-light lg:w-1/12 lg:flex " ><x-inputbluetransparent type="text"  class="" value="{{ $store->canal }}" readonly/></div>
                    <div class="w-4/12 pl-2 font-light lg:w-2/12 lg:flex " ><x-inputbluetransparent type="text"  class="" value="{{ $store->direccion }}" readonly/></div>
                    <div class="w-2/12 pl-2 font-light lg:w-1/12 lg:flex " ><x-inputbluetransparent type="text"  class="" value="{{ $store->poblacion }}" readonly/></div>
                    <div class="w-1/12 pl-2 font-light lg:w-1/12 lg:flex " ><x-inputbluetransparent type="text"  class="" value="{{ $store->cp }}" readonly/></div>
                    <div class="hidden pl-2 font-light lg:w-1/12 lg:flex " ><x-inputbluetransparent type="text"  class="" value="{{ $store->provincia }}" readonly/></div>
                    <div class="w-1/12 pl-2 font-light lg:w-1/12 lg:flex " ><x-inputbluetransparent type="text"  class="" value="{{ $store->telefono }}" readonly/></div>
                    <div class="hidden pl-2 font-light lg:w-1/12 lg:flex " ><x-inputbluetransparent type="text"  class="" value="{{ $store->idioma }}" readonly/></div>
                    <div class="hidden pl-2 font-light lg:w-1/12 lg:flex " ><x-inputbluetransparent type="text"  class="" value="{{ $store->created_at }}" readonly/></div>
                    <div class="hidden pl-2 font-light lg:w-1/12 lg:flex " ><x-inputbluetransparent type="text"  class="" value="{{ $store->updated_at }}" readonly/></div>
                </div>
                @empty
                    <div>
                        <div colspan="10">
                            <div class="flex items-center justify-center">
                                <x-icon.inbox class="w-8 h-8 text-gray-300"/>
                                <span class="py-5 text-xl font-medium text-gray-500">
                                    No se han encontrado datos...
                                </span>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
            <div class="m-3">
                <x-secondary-button  onclick="location.href = '{{ route('campaign.edit',$campaign) }}'">{{ __('Volver') }}</x-secondary-button>
            </div>
        </div>
    </div>
</div>
