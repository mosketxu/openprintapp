<div class="">
    <div class="h-full p-1 mx-2">
        <div class="flex">
            <div class="">
                <h1 class="text-2xl font-semibold text-gray-900">Cabecera de los elementos de la Campaña {{ $campaign->name }}</h1>
                <h2 class="text-xl font-semibold text-gray-900">Cliente: {{ $campaign->entidad->entidad }}</h2>
            </div>
        </div>
        <div class="items-center w-full pl-2 my-1 text-sm text-gray-500 bg-blue-100 rounded-t-md">
            <div class="flex space-x-2">
                <x-input class="bg-transparent border-0 shadow-none" value="{{ __('C.Original') }}" disabled />
                <x-input class="bg-transparent border-0 shadow-none" value="{{ __('C.Nueva') }}" disabled />
                <x-input class="bg-transparent border-0 shadow-none" value="{{ __('Visible') }}" disabled />
            </div>
        </div>
        <form wire:submit.prevent="save">
            <div class="items-center w-full my-1 space-y-1 text-sm text-gray-500 rounded-t-md">
                <div class="flex space-x-2">
                    <x-input class="bg-transparent border-0 shadow-none" value="{{ __('Imagen') }}" disabled />
                    <x-input class="" wire:model="campo0" />
                    <x-checkbox class="mt-4 ml-8"  wire:model="bcampo0" />
                </div>
                <div class="flex space-x-2">
                    <x-input class="bg-transparent border-0 shadow-none" value="{{ __('Campo1') }}" disabled />
                    <x-input class="" wire:model="campo1" />
                    <x-checkbox class="mt-4 ml-8"  wire:model="bcampo1" />
                </div>
                <div class="flex space-x-2">
                    <x-input class="bg-transparent border-0 shadow-none" value="{{ __('Campo2') }}" disabled />
                    <x-input class="" wire:model="campo2" />
                    <x-checkbox class="mt-4 ml-8"  wire:model="bcampo2" />
                </div>
                <div class="flex space-x-2">
                    <x-input class="bg-transparent border-0 shadow-none" value="{{ __('Campo3') }}" disabled />
                    <x-input class="" wire:model="campo3" />
                    <x-checkbox class="mt-4 ml-8"  wire:model="bcampo3" />
                </div>
                <div class="flex space-x-2">
                    <x-input class="bg-transparent border-0 shadow-none" value="{{ __('Campo4') }}" disabled />
                    <x-input class="" wire:model="campo4" />
                    <x-checkbox class="mt-4 ml-8"  wire:model="bcampo4" />
                </div>
                <div class="flex space-x-2">
                    <x-input class="bg-transparent border-0 shadow-none" value="{{ __('Campo5') }}" disabled />
                    <x-input class="" wire:model="campo5" />
                    <x-checkbox class="mt-4 ml-8"  wire:model="bcampo5" />
                </div>
                <div class="flex space-x-2">
                    <x-input class="bg-transparent border-0 shadow-none" value="{{ __('Categoria') }}" disabled />
                    <x-input class="" wire:model="campo6" />
                    <x-checkbox class="mt-4 ml-8"  wire:model="bcampo6" />
                </div>
                <div class="flex space-x-2">
                    <x-input class="bg-transparent border-0 shadow-none" value="{{ __('Archivo') }}" disabled />
                    <x-input class="" wire:model="campo7" />
                    <x-checkbox class="mt-4 ml-8"  wire:model="bcampo7" />
                </div>
                <div class="flex space-x-2">
                    <x-input class="bg-transparent border-0 shadow-none" value="{{ __('Material') }}" disabled />
                    <x-input class="" wire:model="campo8" />
                    <x-checkbox class="mt-4 ml-8"  wire:model="bcampo8" />
                </div>
                <div class="flex space-x-2">
                    <x-input class="bg-transparent border-0 shadow-none" value="{{ __('Medida') }}" disabled />
                    <x-input class="" wire:model="campo9" />
                    <x-checkbox class="mt-4 ml-8"  wire:model="bcampo9" />
                </div>
                <div class="flex space-x-2">
                    <x-input class="bg-transparent border-0 shadow-none" value="{{ __('Idioma') }}" disabled />
                    <x-input class="" wire:model="campo10" />
                    <x-checkbox class="mt-4 ml-8"  wire:model="bcampo10" />
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
                    <x-secondary-button  onclick="location.href = '{{route('campaign.edit',$campaign)}}'">{{ __('Volver') }}</x-secondary-button>
                </div>
            </div>
        </form>
    </div>
</div>
