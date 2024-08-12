<div class="">
    <div class="p-1 mx-2">
        <div class="flex p-1 mx-2" >
            <div class="">
                @if($campaign->id)
                <h1 class="text-2xl font-semibold text-gray-900">Campaña: {{ $campaign->name }}</h1>
                @else
                <h1 class="text-2xl font-semibold text-gray-900">Nueva Campaña</h1>
                @endif
            </div>
            @can('campaign.create')
            <div class="ml-2">
                <x-buttoncolor   onclick="location.href = '{{ route('campaign.create') }}'" >{{ __('Nueva') }}</x-buttoncolor>
            </div>
            @endcan
            @if($campaign->id)
            @can('campaign.edit')
            <div class="ml-2">
                <x-buttoncolor color='lime'  onclick="location.href = '{{ route('campaign.cabecera',$campaign) }}'" >{{ __('Cabecera') }}</x-buttoncolor>
            </div>
            @endcan
            @can('import.index')
            <div class="ml-2">
                <x-buttoncolor color='green'  onclick="location.href = '{{ route('import.index',$campaign) }}'" >{{ __('Importar Datos') }}</x-buttoncolor>
            </div>
            @endcan
            @can('campaign.index')
            <div class="ml-2">
                <x-buttoncolor color='yellow' onclick="location.href = '{{ route('campaign.stores',$campaign) }}'" >{{ __('Lista de Stores') }}</x-buttoncolor>
            </div>
            <div class="ml-2">
                <x-buttoncolor color='gray'  onclick="location.href = '{{ route('campaign.elementos',$campaign) }}'" >{{ __('Lista de Elementos') }}</x-buttoncolor>
            </div>
            <div class="ml-2">
                <x-buttoncolor color='orange'  onclick="location.href = '{{ route('campaign.storeelementos',$campaign) }}'" >{{ __('Detalle Pedido') }}</x-buttoncolor>
            </div>
            @endcan
            @can('campaign.delete')
            <div class="ml-auto">
                <x-buttoncolor color='red'  wire:click.prevent="delete({{ $campaign->id }})" onclick="confirm('¿Estás seguro?') || event.stopImmediatePropagation()">{{ __('Eliminar') }}</x-buttoncolor>
            </div>
            @endcan
            @endif
        </div>
    </div>
    <div class="py-1 space-y-4">
        @include('error')
    </div>
    <div class="h-screen">
        <div class="flex-col space-y-4 text-gray-500">
            {{-- formulario datos --}}
            <form wire:submit="save" class="ml-4" id="form_campaign">
                {{-- datos campaña --}}
                <div class="p-2 space-y-2 text-sm rounded-md ">
                    <div class="w-full">
                        @if($ent->entidad_id)
                            <x-label for="entidad">Cliente</x-label>
                            <x-inputblue id="entidad" type="text" class="w-full " id="entidad" name="entidad_id" value="{{$entidades->first()->entidad}}" disabled/>
                        @else
                            <x-label for="entidadselect">entidad</x-label>
                            <x-selectcolor wire:model="entidad_id"  id="entidadselect" >
                                <option value="--Selecciona Cliente--"></option>
                                @foreach ($entidades as $entidad)
                                <option value="{{ $entidad->id }}">{{ $entidad->entidad }}</option>
                                @endforeach
                            </x-selectcolor>
                            @error('entidad_id') <span class="text-red-500 error">{{ $message }}</span> @enderror
                        @endif
                    </div>
                    <div class="flex w-full space-x-1">
                        <div class="w-full">
                            <x-label for="name">Campaña</x-label>
                            <x-inputblue wire:model="name" type="text" class="w-full " id="name" name="name"  autocomplete/>
                            @error('name') <span class="text-red-500 error">{{ $message }}</span> @enderror
                        </div>
                        <div class="w-full">
                            <x-label for="estado">Estado</x-label>
                            <x-selectcolor wire:model="estado"  id="estado" >
                                <option value="0"> Creada </option>
                                <option value="1"> Iniciada </option>
                                <option value="2"> Finalizada </option>
                                <option value="3"> Cancelada </option>
                            </x-selectcolor>
                            @error('estado') <span class="text-red-500 error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="flex space-x-1 ">
                        <div class="w-full">
                            <x-label for="fechainicio">Fecha Inicio</x-label>
                            <x-inputblue type="date" wire:model="fechainicio" class="w-full " id="fechainicio" name="fechainicio" />
                            @error('fechainicio') <span class="text-red-500 error">{{ $message }}</span> @enderror
                        </div>
                        <div class="w-full">
                            <x-label for="fechafin">Fecha Finalización</x-label>
                            <x-inputblue type="date" wire:model="fechafin" class="w-full " id="fechafin" name="fechafin" />
                            @error('fechafin') <span class="text-red-500 error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                {{-- fechas montaje --}}
                <div class="p-2 space-y-2 text-sm rounded-md bg-blue-50">
                    <div class="my-2 text-base text-blue-900 underline">Fechas Montaje</div>
                    <div class="w-6/12 space-y-2">
                        <div class="flex items-center space-x-2 ">
                            <x-label for="fechainstal1" class="w-1/12">Fecha</x-label>
                            <x-inputblue type="date" wire:model="fechainstal1"  id="fechainstal1" name="fechainstal1" />
                            <x-selectcolor wire:model="montaje1"  id="montaje1" >
                                <option value="">-Selecciona-</option>
                                <option value="M">Montaje</option>
                                <option value="D">Desmontaje</option>
                            </x-selectcolor>
                        </div>
                        <div class="flex items-center w-full space-x-2 ">
                            <x-label for="fechainstal2" class="w-1/12">Fecha</x-label>
                            <x-inputblue type="date" wire:model="fechainstal2" id="fechainstal2" name="fechainstal2" />
                            <x-selectcolor wire:model="montaje2"  id="montaje2" >
                                <option value="">-Selecciona-</option>
                                <option value="M">Montaje</option>
                                <option value="D">Desmontaje</option>
                            </x-selectcolor>
                        </div>
                        <div class="flex items-center w-full space-x-2 ">
                            <x-label for="fechainstal3" class="w-1/12">Fecha</x-label>
                            <x-inputblue type="date" wire:model="fechainstal3" id="fechainstal3" name="fechainstal3" />
                            <x-selectcolor wire:model="montaje3" id="montaje3" >
                                <option value="">-Selecciona-</option>
                                <option value="M">Montaje</option>
                                <option value="D">Desmontaje</option>
                            </x-selectcolor>
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
                        <x-secondary-button  onclick="location.href = '{{route('campaign.index')}}'">{{ __('Volver') }}</x-secondary-button>
                    </div>
                </div>
            </form>
        <div>
    </div>
</div>
