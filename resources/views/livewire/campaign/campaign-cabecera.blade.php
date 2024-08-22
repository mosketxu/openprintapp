<div class="">
    <div class="p-1 mx-2">
        <div class="p-1 mx-2">
            <div class="flex p-1 mx-2">
                <div class="">
                    <h1 class="text-2xl font-semibold text-gray-900">Composición Cabecera</h1>
                    <h2 class="text-xl font-semibold text-gray-900">Campaña: {{$campaign->name}}</h2>
                    <h2 class="text-lg font-semibold text-gray-900">Cliente: {{$campaign->entidad->entidad}}</h2>
                </div>
                @if($campaign->id)
                @include('campaign.acciones')
                @endif
            </div>
        </div>
        <div class="items-center w-full pl-2 my-1 text-sm text-gray-500 bg-blue-100 rounded-t-md">
            <div class="flex space-x-2 ">
                <div class="w-2/12">
                    <x-inputbluetransparent class="" value="{{ __('C.Original') }}" disabled />
                </div>
                <div class="w-2/12">
                    <x-inputbluetransparent class="" value="{{ __('C.Nueva') }}" disabled />
                </div>
                <div class="w-1/12">
                    <x-inputbluetransparent class="" value="{{ __('Visible') }}" disabled />
                </div>
            </div>
        </div>
        <form wire:submit.prevent="save">
            <div class="items-center w-full my-1 space-y-1 text-sm text-gray-500 rounded-t-md">
                <div class="flex space-x-2 hover:bg-gray-100">
                    <div class="w-2/12">
                        <x-inputbluetransparent class="" value="{{ __('Imagen') }}" disabled />
                    </div>
                    <div class="w-2/12">
                        <x-input class="" wire:model="campo0" />
                    </div>
                    <div class="w-1/12 ">
                        <x-checkboxtransparent class="mt-1 ml-8"  wire:model="bcampo0" />
                    </div>
                </div>
                <div class="flex space-x-2 hover:bg-gray-100">
                    <div class="w-2/12">
                        <x-inputbluetransparent class="" value="{{ __('Campo1') }}" disabled />
                    </div>
                    <div class="w-2/12">
                        <x-input class="" wire:model="campo1" />
                    </div>
                    <div class="w-1/12">
                        <x-checkboxtransparent class="mt-2 ml-8"  wire:model="bcampo1" />
                    </div>
                </div>
                <div class="flex space-x-2 hover:bg-gray-100">
                    <div class="w-2/12">
                        <x-inputbluetransparent class="" value="{{ __('Campo2') }}" disabled />
                    </div>
                    <div class="w-2/12">
                        <x-input class="" wire:model="campo2" />
                    </div>
                    <div class="w-1/12">
                        <x-checkboxtransparent class="mt-2 ml-8"  wire:model="bcampo2" />
                    </div>
                </div>
                <div class="flex space-x-2 hover:bg-gray-100">
                    <div class="w-2/12">
                        <x-inputbluetransparent class="" value="{{ __('Campo3') }}" disabled />
                    </div>
                    <div class="w-2/12">
                        <x-input class="" wire:model="campo3" />
                    </div>
                    <div class="w-1/12">
                        <x-checkboxtransparent class="mt-2 ml-8"  wire:model="bcampo3" />
                    </div>
                </div>
                <div class="flex space-x-2 hover:bg-gray-100">
                    <div class="w-2/12">
                        <x-inputbluetransparent class="" value="{{ __('Campo4') }}" disabled />
                    </div>
                    <div class="w-2/12">
                        <x-input class="" wire:model="campo4" />
                    </div>
                    <div class="w-1/12">
                        <x-checkboxtransparent class="mt-2 ml-8"  wire:model="bcampo4" />
                    </div>
                </div>
                <div class="flex space-x-2 hover:bg-gray-100">
                    <div class="w-2/12">
                        <x-inputbluetransparent class="" value="{{ __('Campo5') }}" disabled />
                    </div>
                    <div class="w-2/12">
                        <x-input class="" wire:model="campo5" />
                    </div>
                    <div class="w-1/12">
                        <x-checkboxtransparent class="mt-2 ml-8"  wire:model="bcampo5" />
                    </div>
                </div>
                <div class="flex space-x-2 hover:bg-gray-100">
                    <div class="w-2/12">
                        <x-inputbluetransparent class="" value="{{ __('Categoria') }}" disabled />
                    </div>
                    <div class="w-2/12">
                        <x-input class="" wire:model="campo6" />
                    </div>
                    <div class="w-1/12">
                        <x-checkboxtransparent class="mt-2 ml-8"  wire:model="bcampo6" />
                    </div>
                </div>
                <div class="flex space-x-2 hover:bg-gray-100">
                    <div class="w-2/12">
                        <x-inputbluetransparent class="" value="{{ __('Archivo') }}" disabled />
                    </div>
                    <div class="w-2/12">
                        <x-input class="" wire:model="campo7" />
                    </div>
                    <div class="w-1/12">
                        <x-checkboxtransparent class="mt-2 ml-8"  wire:model="bcampo7" />
                    </div>
                </div>
                <div class="flex space-x-2 hover:bg-gray-100">
                    <div class="w-2/12">
                        <x-inputbluetransparent class="" value="{{ __('Material') }}" disabled />
                    </div>
                    <div class="w-2/12">
                        <x-input class="" wire:model="campo8" />
                    </div>
                    <div class="w-1/12">
                        <x-checkboxtransparent class="mt-2 ml-8"  wire:model="bcampo8" />
                    </div>
                </div>
                <div class="flex space-x-2 hover:bg-gray-100">
                    <div class="w-2/12">
                        <x-inputbluetransparent class="" value="{{ __('Medida') }}" disabled />
                    </div>
                    <div class="w-2/12">
                        <x-input class="" wire:model="campo9" />
                    </div>
                    <div class="w-1/12">
                        <x-checkboxtransparent class="mt-2 ml-8"  wire:model="bcampo9" />
                    </div>
                </div>
                <div class="flex space-x-2 hover:bg-gray-100">
                    <div class="w-2/12">
                        <x-inputbluetransparent class="" value="{{ __('Idioma') }}" disabled />
                    </div>
                    <div class="w-2/12">
                        <x-input class="" wire:model="campo10" />
                    </div>
                    <div class="w-1/12">
                        <x-checkboxtransparent class="mt-2 ml-8"  wire:model="bcampo10" />
                    </div>
                </div>
                <div class="flex space-x-2 hover:bg-gray-100">
                    <div class="w-2/12">
                        <x-inputbluetransparent class="" value="{{ __('Producto') }}" disabled />
                    </div>
                    <div class="w-2/12">
                        <x-input class="" wire:model="producto_id" />
                    </div>
                    <div class="w-1/12">
                        <x-checkboxtransparent class="mt-2 ml-8"  wire:model="bproducto" />
                    </div>
                </div>
                <div class="flex space-x-2 hover:bg-gray-100">
                    <div class="w-2/12">
                        <x-inputbluetransparent class="" value="{{ __('P.Coste') }}" disabled />
                    </div>
                    <div class="w-2/12">
                        <x-input class="" wire:model="preciocoste_ud" />
                    </div>
                    <div class="w-1/12">
                        <x-checkboxtransparent class="mt-2 ml-8"  wire:model="bpreciocoste" />
                    </div>
                </div>
                <div class="flex space-x-2 hover:bg-gray-100">
                    <div class="w-2/12">
                        <x-inputbluetransparent class="" value="{{ __('Imagen') }}" disabled />
                    </div>
                    <div class="w-2/12">
                        <x-input class="" wire:model="imagenelemento" />
                    </div>
                    <div class="w-1/12">
                        <x-checkboxtransparent class="mt-2 ml-8"  wire:model="bimagenelemento" />
                    </div>
                </div>
            </div>
            <div class="flex mt-2 mb-2 ml-2 space-x-4">
                <div class="space-x-3">
                    @can('campaign.create')
                    <x-buttoncolor color='blue' class="relative w-40 disabled:cursor-not-allowed disabled:opacity-75" >
                        {{ __('Guardar') }}
                        <div wire:loading.flex class="absolute top-0 bottom-0 right-0 flex items-center pr-4">
                            <svg class="w-5 h-5 text-white animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </div>
                    </x-buttoncolor>
                    @endcan
                    {{-- <x-secondary-button  onclick="location.href = '{{route('campaign.edit',$campaign)}}'">{{ __('Volver') }}</x-secondary-button> --}}
                    <x-secondary-button  onclick="history.back()">{{ __('Volver') }}</x-secondary-button>

                </div>
            </div>
        </form>
    </div>
</div>
