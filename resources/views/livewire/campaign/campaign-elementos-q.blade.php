<div class="">
    <div class="p-1 mx-2">
        <div class="flex p-1 mx-2">
            <div class="">
                <h1 class="text-2xl font-semibold text-gray-900">Resumen de Elementos</h1>
                <h2 class="text-xl font-semibold text-gray-900">Campaña: {{ $campaign->name }}</h2>
                <h2 class="text-lg font-semibold text-gray-900">Cliente: {{ $campaign->entidad->entidad }}</h2>
            </div>
            @if($campaign->id)
                @include('campaign.acciones')
            @endif
            <div class="items-center w-8 h-8">
                <div class="w-5 ml-2 ">
                    <x-icon.print-a onclick="window.print()"  class="w-5 text-amber-800" title="Imprimir"/>
                </div>
            </div>
            <div class="w-8">
                <div class="w-5 ml-2 ">
                    <x-icon.xls-a id="xls" wire:click="resumenelementosXls('sinstore')" class="w-6 text-green-700 cursor-pointer" title="Resumen Elementos"/>
                </div>
            </div>
            <div class="w-8">
                <div class="w-5 ml-2 ">
                    <x-icon.xls-a id="xls" wire:click="resumenelementosXls('constore')" class="w-6 text-orange-700 cursor-pointer" title="Resumen Elementos por tienda"/>
                </div>
            </div>

        </div>
        <div class="py-1 space-y-1">
            <div class="">
                @include('error')
            </div>
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
                <div class="w-1/12 pl-2 font-light " ><x-label>{{ __('Producto') }}</x-label> </div>
                <div class="w-1/12 pl-2 font-light " ><x-label class="text-right">{{ __('€.Ud') }}</x-label> </div>
                <div class="w-1/12 pl-2 font-light " ><x-label class="text-right">{{ __('Cantidad') }}</x-label> </div>
                <div class="w-1/12 pl-2 font-light " ><x-label class="text-right">{{ __('Total') }}</x-label> </div>
            </div>
            @forelse($elementos as $elemento)
            <div class="flex items-center w-full text-sm text-gray-500 border-t-0 border-y hover:bg-blue-100 " wire:loading.class.delay="opacity-50" >
                @if($bcampo0==true)
                <div class="w-1/12 pr-2 "><x-inputbluetransparent   class="" value="{{ $elemento->imagen }}" readonly/></div>
                @endif
                @if($bcampo1==true)
                <div class="w-1/12 pr-2 "><x-inputbluetransparent   class="" value="{{ $elemento->campo1 }}" readonly/></div>
                @endif
                @if($bcampo2==true)
                <div class="w-1/12 pr-2 "><x-inputbluetransparent   class="" value="{{ $elemento->campo2 }}" readonly/></div>
                @endif
                @if($bcampo3==true)
                <div class="w-1/12 pr-2 "><x-inputbluetransparent   class="" value="{{ $elemento->campo3 }}" readonly/></div>
                @endif
                @if($bcampo4==true)
                <div class="w-1/12 pr-2 "><x-inputbluetransparent   class="" value="{{ $elemento->campo4 }}" readonly/></div>
                @endif
                @if($bcampo5==true)
                <div class="w-1/12 pr-2 "><x-inputbluetransparent   class="" value="{{ $elemento->campo5 }}" readonly/></div>
                @endif
                @if($bcampo6==true)
                <div class="w-1/12 pr-2 "><x-inputbluetransparent   class="" value="{{ $elemento->categoria }}" readonly/></div>
                @endif
                @if($bcampo7==true)
                <div class="w-1/12 pr-2 "><x-inputbluetransparent   class="" value="{{ $elemento->archivo }}" readonly/></div>
                @endif
                @if($bcampo8==true)
                <div class="w-1/12 pr-2 "><x-inputbluetransparent   class="" value="{{ $elemento->material }}" readonly/></div>
                @endif
                @if($bcampo9==true)
                <div class="w-1/12 pr-2 "><x-inputbluetransparent   class="" value="{{ $elemento->medida }}" readonly/></div>
                @endif
                @if($bcampo10==true)
                    <div class="w-1/12 pr-2 "><x-inputbluetransparent   class="" value="{{ $elemento->idioma }}" readonly/></div>
                @endif
                <div class="w-1/12"><x-inputbluetransparent   class="" value="{{ $elemento->descripcion }}" readonly/></div>
                <div class="w-1/12 text-right "><x-inputbluetransparent   class="text-right " value="{{ $elemento->preciocoste_ud }}" readonly/></div>
                <div class="w-1/12 text-right"><x-inputbluetransparent   class="text-right " value="{{ $elemento->cantidadtotal }}" readonly/></div>
                <div class="w-1/12 text-right"><x-inputbluetransparent   class="text-right " value="{{ round($elemento->cantidadtotal * $elemento->preciocoste_ud,2)}}" readonly/></div>
                <div class="w-1/12 pl-2 font-light" >
                    @if(file_exists( 'storage/galeria/'.$campaign->id.'/thumbnails/thumb-'.$elemento->imagenelemento ))
                    <label class="cursor-pointer">
                        <img src="{{asset('storage/galeria/'.$campaign->id.'/thumbnails/thumb-'.$elemento->imagenelemento.'?'.time())}}" alt={{$elemento->imagenelemento}} title={{$elemento->imagenelemento}}
                        class="h-10 mx-auto"/>
                    </label>
                    @else
                    <label class="cursor-pointer">
                        <img src="{{asset('storage/galeria/pordefecto.jpg')}}" alt={{$elemento->imagenelemento}} title={{$elemento->imagenelemento}}
                        class="h-10 mx-auto"/>
                    </label>
                    @endif
                                </div>
            </div>
            @empty
                <div class="flex items-center justify-center">
                    <x-icon.inbox class="w-8 h-8 text-gray-300"/><span class="py-5 text-xl font-medium text-gray-500">No se han encontrado datos...</span>
                </div>
            @endforelse
        </div>
    </div>
</div>

