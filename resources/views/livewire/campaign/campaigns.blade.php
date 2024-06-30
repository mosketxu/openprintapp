<div class="">
    <div class="h-full p-1 mx-2">
        <h1 class="text-2xl font-semibold text-gray-900">Campañas
            @if($cliente->entidad_id)
            del cliente {{$entidades->first()->entidad}}
            @endif
        </h1>
        <div class="py-1 space-y-4">
            {{-- <div class="">
                @include('errores')
            </div> --}}
            <div class="flex justify-between">
                <div class="flex w-10/12 space-x-3">
                    @include('campaign.campaignfilters')
                </div>
                @can('campaign.create')
                <div class="flex flex-row-reverse w-2/12 mr-2">
                    <div class="pt-3">
                        <x-buttoncolor color='blue'  onclick="location.href = '{{ route('campaign.create') }}'">{{ __('Nueva') }}</x-buttoncolor>
                    </div>
                </div>
                @endcan

            </div>

            <div class="">
                <div class="flex w-full py-2 pl-2 text-sm text-gray-500 bg-blue-100 rounded-t-md">
                    <div class="w-2/12 pl-2 font-light lg:w-4/12" ><x-label>{{ __('Cliente') }}</x-label> </div>
                    <div class="w-4/12 pl-2 font-light lg:w-4/12" ><x-label>{{ __('Campaña') }}</x-label></div>
                    <div class="w-1/12 pl-2 font-light " ><x-label>{{ __('F.Inicio') }}</x-label></div>
                    <div class="w-1/12 pl-2 font-light " ><x-label>{{ __('F.Fin') }}</x-label></div>
                    <div class="w-1/12 pl-2 font-light " ><x-label>{{ __('Estado') }}</x-label></div>
                    <div class="hidden pl-2 font-light lg:w-1/12 lg:flex " ><x-label>{{ __('F.Instal.1') }}</x-label></div>
                    <div class="hidden pl-2 font-light lg:w-1/12 lg:flex " ><x-label>{{ __('F.Instal.2') }}</x-label></div>
                    <div class="hidden pl-2 font-light lg:w-1/12 lg:flex " ><x-label>{{ __('F.Instal.3') }}</x-label></div>
                </div>
                @forelse ($campaigns as $campaign)

                <div class="flex items-center w-full text-sm text-gray-500 border-t-0 border-y hover:bg-gray-100 hover:cursor-pointer"
                    onclick="location.href = '{{ route('campaign.edit',$campaign) }}'"
                    wire:loading.class.delay="opacity-50" >
                    <div class="w-2/12 pr-2 lg:w-4/12 "><x-inputbluetransparent type="text"  class="" value="{{ $campaign->cliente->entidad }}" readonly/></div>
                    <div class="w-4/12 pr-2 lg:w-4/12 "><x-inputbluetransparent type="text"  class="" value="{{ $campaign->name }}" readonly/></div>
                    <div class="w-1/12 pr-2 "><x-inputbluetransparent type="text"  class="" value="{{ $campaign->fini }}"  readonly/></div>
                    <div class="w-1/12 pr-2 "><x-inputbluetransparent type="text"  class=""  value="{{ $campaign->ffin }}"  readonly/></div>
                    <div class="w-1/12 pr-2 "><x-inputbluetransparent type="text"  class=" {{$campaign->campestado[0]}}"  value="{{$campaign->campestado[1]}}" readonly/></div>
                    <div class="hidden pr-2 lg:w-1/12 lg:flex "><x-inputbluetransparent type="text"  class=""  value="{{ $campaign->finst1 }}" readonly/></div>
                    <div class="hidden pr-2 lg:w-1/12 lg:flex "><x-inputbluetransparent type="text"  class=""  value="{{ $campaign->finst2 }}" readonly/></div>
                    <div class="hidden pr-2 lg:w-1/12 lg:flex "><x-inputbluetransparent type="text"  class=""  value="{{ $campaign->finst3 }}" readonly/></div>
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
        </div>
    </div>
</div>
