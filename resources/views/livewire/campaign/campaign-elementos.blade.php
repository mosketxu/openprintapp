<div class="">
    <div class="p-1 mx-2">
        <div class="flex p-1 mx-2">
            <div class="">
                <h1 class="text-2xl font-semibold text-gray-900">Elementos</h1>
                <h2 class="text-xl font-semibold text-gray-900">Campaña: {{$campaign->name}}</h2>
                <h2 class="text-lg font-semibold text-gray-900">Cliente: {{$campaign->entidad->entidad}}</h2>
            </div>
            @if($campaign->id)
            @include('campaign.acciones')
            @endif
            <div class="w-8">
                <div class="w-5 ml-2 ">
                    <x-icon.xls-a id="xls" wire:click="elementosXls" class="w-6 text-green-700 cursor-pointer" title="Exporta Excel"/>
                </div>
            </div>
        </div>
    </div>
    <div class="py-1 space-y-4">
        <div class="">
            @include('error')
        </div>
        <div class="overflow-x-auto">
            <div class="">
                <div class="flex items-center text-xs text-gray-500 bg-blue-100 rounded-t-md">
                    @if($bcampo0==true)
                    <div class="w-1/12 pl-2 font-light" >
                        <x-inputbluetransparent type="text"  class="" wire:model='campo0' />
                        <x-checkbox class="mx-auto"  wire:model="bcampo0" />
                    </div>
                    @endif
                    @if($bcampo1==true)
                    <div class="w-1/12 pl-2 font-light" >
                        <x-inputbluetransparent type="text"  class="" wire:model='campo1' />
                        <x-checkbox class="mx-auto"  wire:model="bcampo1" />
                    </div>
                    @endif
                    @if($bcampo2==true)
                    <div class="w-1/12 pl-2 font-light" >
                        <x-inputbluetransparent type="text"  class="" wire:model='campo2' />
                        <x-checkbox class="mx-auto"  wire:model="bcampo2" />
                    </div>
                    @endif
                    @if($bcampo3==true)
                    <div class="w-1/12 pl-2 font-light" >
                        <x-inputbluetransparent type="text"  class="" wire:model='campo3' />
                        <x-checkbox class="mx-auto"  wire:model="bcampo3" />
                    </div>
                    @endif
                    @if($bcampo4==true)
                    <div class="w-1/12 pl-2 font-light" >
                        <x-inputbluetransparent type="text"  class="" wire:model='campo4' />
                        <x-checkbox class="mx-auto"  wire:model="bcampo4" />
                    </div>
                    @endif
                    @if($bcampo5==true)
                    <div class="w-1/12 pl-2 font-light" >
                        <x-inputbluetransparent type="text"  class="" wire:model='campo5' />
                        <x-checkbox class="mx-auto"  wire:model="bcampo5" />
                    </div>
                    @endif
                    @if($bcampo6==true)
                    <div class="w-1/12 pl-2 font-light" >
                        <x-inputbluetransparent type="text"  class="" wire:model='campo6' />
                        <x-checkbox class="mx-auto"  wire:model="bcampo6" />
                    </div>
                    @endif
                    @if($bcampo7==true)
                    <div class="w-1/12 pl-2 font-light" >
                        <x-inputbluetransparent type="text"  class="" wire:model='campo7' />
                        <x-checkbox class="mx-auto"  wire:model="bcampo7" />
                    </div>
                    @endif
                    @if($bcampo8==true)
                    <div class="w-1/12 pl-2 font-light" >
                        <x-inputbluetransparent type="text"  class="" wire:model='campo8' />
                        <x-checkbox class="mx-auto"  wire:model="bcampo8" />
                    </div>
                    @endif
                    @if($bcampo9==true)
                    <div class="w-1/12 pl-2 font-light" >
                        <x-inputbluetransparent type="text"  class="" wire:model='campo9' />
                        <x-checkbox class="mx-auto"  wire:model="bcampo9" />
                    </div>
                    @endif
                    @if($bcampo10==true)
                    <div class="w-1/12 pl-2 font-light" >
                        <x-inputbluetransparent type="text"  class="" wire:model='campo10' />
                        <x-checkbox class="mx-auto"  wire:model="bcampo10" />
                    </div>
                    @endif
                    <div class="w-1/12 pl-2 font-light" ><x-inputbluetransparent type="text"  class="" value="{{ __('Producto') }}" readonly/></div>
                    <div class="w-1/12 pl-2 font-light" ><x-inputbluetransparent type="text"  class="" value="{{ __('Updated_at') }}" readonly/></div>
                    <div class="w-1/12 pl-2 font-light" ><x-inputbluetransparent type="text"  class="" value="{{ __('Imagen') }}" readonly/></div>
                    @can('campaign.create')
                    <div class="w-10 pr-2 font-light" ><x-icon.save-a wire:click="saveCabecera" class="w-5 text-blue-500" title="guardar"/></div>
                    @endcan
                </div>
                @forelse ($elementos as $elemento)
                <div class="flex items-center text-gray-500 border-t-0 border-y hover:bg-gray-100 hover:cursor-pointer"
                    onclick="location.href = '{{ route('campaignelemento.edit',$elemento) }}'"
                    wire:loading.class.delay="opacity-50" >
                    @if($bcampo0==true)
                    <div class="w-1/12 pl-2 font-light" ><x-inputbluetransparent type="text"  class="text-xs" value="{{ $elemento->imagen }}" readonly/></div>
                    @endif
                    @if($bcampo1==true)
                    <div class="w-1/12 pl-2 font-light" ><x-inputbluetransparent type="text"  class="text-xs" value="{{ $elemento->campo1 }}" readonly/></div>
                    @endif
                    @if($bcampo2==true)
                    <div class="w-1/12 pl-2 font-light" ><x-inputbluetransparent type="text"  class="text-xs" value="{{ $elemento->campo2 }}" readonly/></div>
                    @endif
                    @if($bcampo3==true)
                    <div class="w-1/12 pl-2 font-light" ><x-inputbluetransparent type="text"  class="text-xs" value="{{ $elemento->campo3 }}" readonly/></div>
                    @endif
                    @if($bcampo4==true)
                    <div class="w-1/12 pl-2 font-light" ><x-inputbluetransparent type="text"  class="text-xs" value="{{ $elemento->campo4 }}" readonly/></div>
                    @endif
                    @if($bcampo5==true)
                    <div class="w-1/12 pl-2 font-light" ><x-inputbluetransparent type="text"  class="text-xs" value="{{ $elemento->campo5 }}" readonly/></div>
                    @endif
                    @if($bcampo6==true)
                    <div class="w-1/12 pl-2 font-light" ><x-inputbluetransparent type="text"  class="text-xs" value="{{ $elemento->categoria }}" readonly/></div>
                    @endif
                    @if($bcampo7==true)
                    <div class="w-1/12 pl-2 font-light" ><x-inputbluetransparent type="text"  class="text-xs" value="{{ $elemento->archivo }}" readonly/></div>
                    @endif
                    @if($bcampo8==true)
                    <div class="w-1/12 pl-2 font-light" ><x-inputbluetransparent type="text"  class="text-xs" value="{{ $elemento->material }}" readonly/></div>
                    @endif
                    @if($bcampo9==true)
                    <div class="w-1/12 pl-2 font-light" ><x-inputbluetransparent type="text"  class="text-xs" value="{{ $elemento->medida }}" readonly/></div>
                    @endif
                    @if($bcampo10==true)
                    <div class="w-1/12 pl-2 font-light" ><x-inputbluetransparent type="text"  class="text-xs" value="{{ $elemento->idioma }}" readonly/></div>
                    @endif
                    <div class="w-1/12 pl-2 font-light" ><x-inputbluetransparent type="text"  class="text-xs" value="{{ $elemento->producto->descripcion }}" readonly/></div>
                    <div class="w-1/12 pl-2 font-light" ><x-inputbluetransparent type="text"  class="text-xs" value="{{ $elemento->updated_at }}" readonly/></div>
                    <div class="w-1/12 pl-2 font-light" >
                        @livewire('campaign.campaign-galeria',['campaign'=>$campaign,'elemento'=>$elemento,key($elemento->id)])
                    </div>
                    @can('campaign.create')
                    <div class="w-10 pr-2 font-light" ></div>
                    @endcan
                </div>
                @empty
                <div colspan="10">
                    <div class="flex items-center justify-center">
                        <x-icon.inbox class="w-8 h-8 text-gray-300"/>
                        <span class="py-5 text-xl font-medium text-gray-500">No se han encontrado datos...</span>
                    </div>
                </div>
                @endforelse
            </div>
            <div class="mt-4">
                {{ $elementos->links() }}
            </div>
        </div>
        <div class="m-3">
            <x-secondary-button  onclick="location.href = '{{ route('import.index',$campaign) }}'">{{ __('Volver') }}</x-secondary-button>
        </div>
    </div>
</div>
