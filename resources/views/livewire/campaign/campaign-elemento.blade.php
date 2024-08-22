<div class="">
    <div class="p-1 mx-2">
        <div class="flex p-1 mx-2">
            <div class="">
                <h1 class="text-2xl font-semibold text-gray-900">Detalle del Elemento:</h1>
                <h2 class="text-xl font-semibold text-gray-900">Campaña: {{$campaign->name}}</h2>
                <h2 class="text-lg font-semibold text-gray-900">Cliente: {{$campaign->entidad->entidad}}</h2>
            </div>
            @if($campaign->id)
            @include('campaign.acciones')
            @endif
        </div>
    </div>
    <div class="">
        @include('error')
    </div>
    <div class="flex py-1">
        <div class="w-8/12">
            <form wire:submit.prevent="save" class="mx-2 ">
                <div class="items-center w-full space-y-1 text-sm text-gray-500 rounded-t-md">
                    @if($cabecera->bcampo0==true)
                        <div class="flex ">
                            <div class="w-2/12">
                                <x-inputbluetransparent  value="{{ $cabecera->campo0 }}" disabled />
                            </div>
                            <div class="w-10/12">
                                <x-inputblue wire:model="imagen" />
                            </div>
                        </div>
                    @endif
                    @if($cabecera->bcampo1==true)
                        <div class="flex ">
                            <div class="w-2/12">
                                <x-inputbluetransparent  value="{{ $cabecera->campo1 }}" disabled />
                            </div>
                            <div class="w-10/12">
                                <x-inputblue class="" wire:model="campo1" />
                            </div>
                        </div>
                    @endif
                    @if($cabecera->bcampo2==true)
                        <div class="flex ">
                            <div class="w-2/12">
                                <x-inputbluetransparent  value="{{ $cabecera->campo2 }}" disabled />
                            </div>
                            <div class="w-10/12">
                                <x-inputblue class="" wire:model="campo2" />
                            </div>
                        </div>
                    @endif
                    @if($cabecera->bcampo3==true)
                        <div class="flex ">
                            <div class="w-2/12">
                                <x-inputbluetransparent  value="{{ $cabecera->campo3 }}" disabled />
                            </div>
                            <div class="w-10/12">
                                <x-inputblue class="" wire:model="campo3" />
                            </div>
                        </div>
                    @endif
                    @if($cabecera->bcampo4==true)
                        <div class="flex ">
                            <div class="w-2/12">
                                <x-inputbluetransparent  value="{{ $cabecera->campo4 }}" disabled />
                            </div>
                            <div class="w-10/12">
                                <x-inputblue class="" wire:model="campo4" />
                            </div>
                        </div>
                    @endif
                    @if($cabecera->bcampo5==true)
                        <div class="flex ">
                            <div class="w-2/12">
                                <x-inputbluetransparent  value="{{ $cabecera->campo5 }}" disabled />
                            </div>
                            <div class="w-10/12">
                                <x-inputblue class="" wire:model="campo5" />
                            </div>
                        </div>
                    @endif
                    @if($cabecera->bcampo6==true)
                        <div class="flex ">
                            <div class="w-2/12">
                                <x-inputbluetransparent  value="{{ $cabecera->campo6 }}" disabled />
                            </div>
                            <div class="w-10/12">
                                <x-inputblue class="" wire:model="categoria" />
                            </div>
                        </div>
                    @endif
                    @if($cabecera->bcampo7==true)
                        <div class="flex ">
                            <div class="w-2/12">
                                <x-inputbluetransparent  value="{{ $cabecera->campo7 }}" disabled />
                            </div>
                            <div class="w-10/12">
                                <x-inputblue class="" wire:model="archivo" />
                            </div>
                        </div>
                    @endif
                    @if($cabecera->bcampo8==true)
                        <div class="flex ">
                            <div class="w-2/12">
                                <x-inputbluetransparent  value="{{ $cabecera->campo8 }}" disabled />
                            </div>
                            <div class="w-10/12">
                                <x-inputblue class="" wire:model="material" />
                            </div>
                        </div>
                    @endif
                    @if($cabecera->bcampo9==true)
                        <div class="flex ">
                            <div class="w-2/12">
                                <x-inputbluetransparent  value="{{ $cabecera->campo9 }}" disabled />
                            </div>
                            <div class="w-10/12">
                                <x-inputblue class="" wire:model="medida" />
                            </div>
                        </div>
                    @endif
                    @if($cabecera->bcampo10==true)
                        <div class="flex ">
                            <div class="w-2/12">
                                <x-inputbluetransparent  value="{{ $cabecera->campo10 }}" disabled />
                            </div>
                            <div class="w-10/12">
                                <x-inputblue class="" wire:model="idioma" />
                            </div>
                        </div>
                    @endif
                    @if($cabecera->elementificador==true)
                        <div class="flex ">
                            <div class="w-2/12">
                                <x-inputbluetransparent  value="{{ $cabecera->elementificador }}" disabled />
                            </div>
                            <div class="w-10/12">
                                <x-inputblue class="" wire:model="elementificador" />
                            </div>
                        </div>
                    @endif
                    @if($cabecera->producto_id==true)
                        <div class="flex ">
                            <div class="w-2/12">
                                <x-inputbluetransparent  value="{{ $cabecera->producto_id }}" disabled />
                            </div>
                            <div class="w-10/12">
                                <select wire:model.lazy="producto_id" class="w-full py-2 text-xs text-gray-600 bg-white border-blue-300 rounded-md shadow-sm appearance-none hover:border-gray-400 focus:outline-none">
                                    <option value="">--Selecciona producto--</option>
                                    @foreach ($productos as $producto)
                                    <option value="{{ $producto->id }}">{{ $producto->descripcion }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif
                    @if($cabecera->preciocoste_ud==true)
                        <div class="flex ">
                            <div class="w-2/12">
                                <x-inputbluetransparent  value="{{ $cabecera->preciocoste_ud }}" disabled />
                            </div>
                            <div class="w-10/12">
                                <x-inputblue class="" type="number" step="any"  wire:model="preciocoste_ud" />
                            </div>
                        </div>
                    @endif
                </div>
                <div class="flex mt-2 mb-2 ml-2 space-x-4">
                    <div class="space-x-3">
                        @can('campaign.edit')
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
        <div class="w-4/12">
            <div class="mx-2 ">
                @if($cabecera->imagenelemento==true)
                <div class="flex mb-2 ">
                    <div class="w-2/12">
                        <x-inputbluetransparent  value="{{ $cabecera->imagenelemento }}" disabled />
                    </div>
                    <div class="w-10/12">
                        @livewire('campaign.campaign-galeria',['campaign'=>$campaign,'elemento'=>$campaignElemento,key($campaignElemento->id)])
                    </div>
                </div>
            @endif
            @if($cabecera->created_at==true)
                <div class="flex mb-2">
                    <div class="w-2/12">
                        <x-inputbluetransparent  value="Creado" disabled />
                    </div>
                    <div class="w-10/12">
                        <x-inputblue class="" wire:model="created_at" disabled />
                    </div>
                </div>
            @endif
            @if($cabecera->updated_at==true)
                <div class="flex ">
                    <div class="w-2/12">
                        <x-inputbluetransparent  value="Actualizado" disabled />
                    </div>
                    <div class="w-10/12">
                        <x-inputblue class="" wire:model="updated_at"  disabled/>
                    </div>
                </div>
            @endif
            </div>
        </div>
    </div>
</div>
