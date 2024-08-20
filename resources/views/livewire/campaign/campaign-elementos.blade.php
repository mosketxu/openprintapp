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
                    @if($cabecera->bcampo0==true)
                    <div class="w-1/12 pl-2 font-light" ><x-inputbluetransparent type="text"  class="" value="{{ $cabecera->campo0 }}" readonly/></div>
                    @endif
                    @if($cabecera->bcampo1==true)
                    <div class="w-1/12 pl-2 font-light" ><x-inputbluetransparent type="text"  class="" value="{{ $cabecera->campo1 }}" readonly/></div>
                    @endif
                    @if($cabecera->bcampo2==true)
                    <div class="w-1/12 pl-2 font-light" ><x-inputbluetransparent type="text"  class="" value="{{ $cabecera->campo2 }}" readonly/></div>
                    @endif
                    @if($cabecera->bcampo3==true)
                    <div class="w-1/12 pl-2 font-light" ><x-inputbluetransparent type="text"  class="" value="{{ $cabecera->campo3 }}" readonly/></div>
                    @endif
                    @if($cabecera->bcampo4==true)
                    <div class="w-1/12 pl-2 font-light" ><x-inputbluetransparent type="text"  class="" value="{{ $cabecera->campo4 }}" readonly/></div>
                    @endif
                    @if($cabecera->bcampo5==true)
                    <div class="w-1/12 pl-2 font-light" ><x-inputbluetransparent type="text"  class="" value="{{ $cabecera->campo5 }}" readonly/></div>
                    @endif
                    @if($cabecera->bcampo6==true)
                    <div class="w-1/12 pl-2 font-light" ><x-inputbluetransparent type="text"  class="" value="{{ $cabecera->campo6 }}" readonly/></div>
                    @endif
                    @if($cabecera->bcampo7==true)
                    <div class="w-1/12 pl-2 font-light" ><x-inputbluetransparent type="text"  class="" value="{{ $cabecera->campo7 }}" readonly/></div>
                    @endif
                    @if($cabecera->bcampo8==true)
                    <div class="w-1/12 pl-2 font-light" ><x-inputbluetransparent type="text"  class="" value="{{ $cabecera->campo8 }}" readonly/></div>
                    @endif
                    @if($cabecera->bcampo9==true)
                    <div class="w-1/12 pl-2 font-light" ><x-inputbluetransparent type="text"  class="" value="{{ $cabecera->campo9 }}" readonly/></div>
                    @endif
                    @if($cabecera->bcampo10==true)
                    <div class="w-1/12 pl-2 font-light" ><x-inputbluetransparent type="text"  class="" value="{{ $cabecera->campo10 }}" readonly/></div>
                    @endif
                    <div class="w-1/12 pl-2 font-light" ><x-inputbluetransparent type="text"  class="" value="Producto" readonly/></div>
                    <div class="w-1/12 pl-2 font-light" ><x-inputbluetransparent type="text"  class="" value="{{ __('Updated_at') }}" readonly/></div>
                    <div class="w-1/12 pl-2 font-light" ><x-inputbluetransparent type="text"  class="" value="{{ __('Imagen') }}" readonly/></div>
                </div>
                @forelse ($elementos as $elemento)
                <div class="flex items-center text-xs text-gray-500 border-t-0 border-y hover:bg-gray-100 hover:cursor-pointer"
                    onclick="location.href = '{{ route('campaignelemento.edit',$elemento) }}'"
                    wire:loading.class.delay="opacity-50" >
                    @if($cabecera->bcampo0==true)
                    <div class="w-1/12 pl-2 font-light" ><x-inputbluetransparent type="text"  class="" value="{{ $elemento->imagen }}" readonly/></div>
                    @endif
                    @if($cabecera->bcampo1==true)
                    <div class="w-1/12 pl-2 font-light" ><x-inputbluetransparent type="text"  class="" value="{{ $elemento->campo1 }}" readonly/></div>
                    @endif
                    @if($cabecera->bcampo2==true)
                    <div class="w-1/12 pl-2 font-light" ><x-inputbluetransparent type="text"  class="" value="{{ $elemento->campo2 }}" readonly/></div>
                    @endif
                    @if($cabecera->bcampo3==true)
                    <div class="w-1/12 pl-2 font-light" ><x-inputbluetransparent type="text"  class="" value="{{ $elemento->campo3 }}" readonly/></div>
                    @endif
                    @if($cabecera->bcampo4==true)
                    <div class="w-1/12 pl-2 font-light" ><x-inputbluetransparent type="text"  class="" value="{{ $elemento->campo4 }}" readonly/></div>
                    @endif
                    @if($cabecera->bcampo5==true)
                    <div class="w-1/12 pl-2 font-light" ><x-inputbluetransparent type="text"  class="" value="{{ $elemento->campo5 }}" readonly/></div>
                    @endif
                    @if($cabecera->bcampo6==true)
                    <div class="w-1/12 pl-2 font-light" ><x-inputbluetransparent type="text"  class="" value="{{ $elemento->categoria }}" readonly/></div>
                    @endif
                    @if($cabecera->bcampo7==true)
                    <div class="w-1/12 pl-2 font-light" ><x-inputbluetransparent type="text"  class="" value="{{ $elemento->archivo }}" readonly/></div>
                    @endif
                    @if($cabecera->bcampo8==true)
                    <div class="w-1/12 pl-2 font-light" ><x-inputbluetransparent type="text"  class="" value="{{ $elemento->material }}" readonly/></div>
                    @endif
                    @if($cabecera->bcampo9==true)
                    <div class="w-1/12 pl-2 font-light" ><x-inputbluetransparent type="text"  class="" value="{{ $elemento->medida }}" readonly/></div>
                    @endif
                    @if($cabecera->bcampo10==true)
                    <div class="w-1/12 pl-2 font-light" ><x-inputbluetransparent type="text"  class="" value="{{ $elemento->idioma }}" readonly/></div>
                        {{ $elemento->id }}
                    @endif
                    <div class="w-1/12 pl-2 font-light" ><x-inputbluetransparent type="text"  class="" value="{{ $elemento->producto->descripcion }}" readonly/></div>
                    <div class="w-1/12 pl-2 font-light" ><x-inputbluetransparent type="text"  class="" value="{{ $elemento->updated_at }}" readonly/></div>
                    <div class="w-1/12 pl-2 font-light" >
                        @livewire('campaign.campaign-galeria',['campaign'=>$campaign,'elemento'=>$elemento,key($elemento->id)])
                    </div>
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
