<div class="">
    <div class="h-full p-1 mx-2">
        <h1 class="text-2xl font-semibold text-gray-900">Lista de Elementos de la Campaña: {{$campaign->name}} del cliente {{$campaign->cliente->entidad}}</h1>
        <div class="py-1 space-y-4">
            {{-- <div class="">
                @include('errores')
            </div> --}}
            {{-- <div class="flex justify-between">
                <div class="flex w-10/12 space-x-3">
                    @include('campaign.campaignelementosfilters')
                </div>
            </div> --}}
            <div class="">
                <div class="flex w-full py-2 pl-2 text-sm text-gray-500 bg-blue-100 rounded-t-md">
                    <div class="w-1/12 pl-2 font-light lg:w-1/12 lg:flex " ><x-label>{{ __('Imagen') }}</x-label> </div>
                    <div class="w-1/12 pl-2 font-light lg:w-1/12 lg:flex " ><x-label>{{ __('Campo1') }}</x-label></div>
                    <div class="w-1/12 pl-2 font-light lg:w-1/12 lg:flex " ><x-label>{{ __('Campo2') }}</x-label></div>
                    <div class="w-1/12 pl-2 font-light lg:w-1/12 lg:flex " ><x-label>{{ __('Campo3') }}</x-label></div>
                    <div class="w-1/12 pl-2 font-light lg:w-1/12 lg:flex " ><x-label>{{ __('Campo4') }}</x-label></div>
                    <div class="w-1/12 pl-2 font-light lg:w-1/12 lg:flex " ><x-label>{{ __('Campo5') }}</x-label></div>
                    <div class="w-1/12 pl-2 font-light lg:w-1/12 lg:flex " ><x-label>{{ __('Archivo') }}</x-label></div>
                    <div class="w-1/12 pl-2 font-light lg:w-1/12 lg:flex " ><x-label>{{ __('Material') }}</x-label></div>
                    <div class="w-1/12 pl-2 font-light lg:w-1/12 lg:flex " ><x-label>{{ __('Medida') }}</x-label></div>
                    <div class="w-1/12 pl-2 font-light lg:w-1/12 lg:flex " ><x-label>{{ __('Idioma') }}</x-label></div>
                    <div class="w-1/12 pl-2 font-light lg:w-1/12 lg:flex " ><x-label>{{ __('Elementif.') }}</x-label></div>
                    <div class="w-1/12 pl-2 font-light lg:w-1/12 lg:flex " ><x-label>{{ __('Updated_at') }}</x-label></div>
                </div>
                @forelse ($elementos as $elemento)

                <div class="flex items-center w-full text-sm text-gray-500 border-t-0 border-y hover:bg-gray-100 hover:cursor-pointer"
                    {{-- onclick="location.href = '{{ route('campaign.edit',$campaign) }}'" --}}
                    wire:loading.class.delay="opacity-50" >
                    <div class="w-1/12 pl-2 font-light lg:w-1/12 lg:flex " ><x-inputbluetransparent type="text"  class="" value="{{ $elemento->imagen }}" readonly/></div>
                    <div class="w-1/12 pl-2 font-light lg:w-1/12 lg:flex " ><x-inputbluetransparent type="text"  class="" value="{{ $elemento->campo1 }}" readonly/></div>
                    <div class="w-1/12 pl-2 font-light lg:w-1/12 lg:flex " ><x-inputbluetransparent type="text"  class="" value="{{ $elemento->campo2 }}" readonly/></div>
                    <div class="w-1/12 pl-2 font-light lg:w-1/12 lg:flex " ><x-inputbluetransparent type="text"  class="" value="{{ $elemento->campo3 }}" readonly/></div>
                    <div class="w-1/12 pl-2 font-light lg:w-1/12 lg:flex " ><x-inputbluetransparent type="text"  class="" value="{{ $elemento->campo4 }}" readonly/></div>
                    <div class="w-1/12 pl-2 font-light lg:w-1/12 lg:flex " ><x-inputbluetransparent type="text"  class="" value="{{ $elemento->campo5 }}" readonly/></div>
                    <div class="w-1/12 pl-2 font-light lg:w-1/12 lg:flex " ><x-inputbluetransparent type="text"  class="" value="{{ $elemento->archivo }}" readonly/></div>
                    <div class="w-1/12 pl-2 font-light lg:w-1/12 lg:flex " ><x-inputbluetransparent type="text"  class="" value="{{ $elemento->material }}" readonly/></div>
                    <div class="w-1/12 pl-2 font-light lg:w-1/12 lg:flex " ><x-inputbluetransparent type="text"  class="" value="{{ $elemento->medida }}" readonly/></div>
                    <div class="w-1/12 pl-2 font-light lg:w-1/12 lg:flex " ><x-inputbluetransparent type="text"  class="" value="{{ $elemento->idioma }}" readonly/></div>
                    <div class="w-1/12 pl-2 font-light lg:w-1/12 lg:flex " ><x-inputbluetransparent type="text"  class="" value="{{ $elemento->elementificador }}" readonly/></div>
                    <div class="w-1/12 pl-2 font-light lg:w-1/12 lg:flex " ><x-inputbluetransparent type="text"  class="" value="{{ $elemento->updated_at }}" readonly/></div>
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
