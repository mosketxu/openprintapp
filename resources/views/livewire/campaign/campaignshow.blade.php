<div class="">
    {{-- @livewire('menu',['campaign'=>$campaign],key($campaign->id)) --}}

    <div class="p-1 mx-2">
        <div class="flex flex-row space-x-8" >
            <div class="">
                @if($campaign->id)
                <h1 class="text-2xl font-semibold text-gray-900">Campaña: {{ $campaign->name }}</h1>
                @else
                <h1 class="text-2xl font-semibold text-gray-900">Nueva Campaña</h1>
                @endif
            </div>
        </div>
    </div>
    <div class="py-1 space-y-4">
        {{-- @include('errormessages') --}}
        @include('error')
    </div>
    <div class="h-screen">
        <div class="flex-col space-y-4 text-gray-500">
            {{-- formulario datos --}}
            <form wire:submit="save" class="ml-4" id="form_campaign">
                {{-- datos campaña --}}
                <div class="p-2 space-y-2 text-sm rounded-md ">
                    <div class="w-full">
                        <x-label for="cliente">Cliente</x-label>
                        <x-inputblue id="cliente" type="text" class="w-full " id="cliente" name="entidad_id" value="{{$entidades->first()->entidad}}" disabled/>
                    </div>
                    <div class="flex w-full space-x-1">
                        <div class="w-full">
                            <x-label for="name">Campaña</x-label>
                            <x-inputblue wire:model="name" type="text" class="w-full " id="name" name="name"  autocomplete disabled/>
                            @error('name') <span class="text-red-500 error">{{ $message }}</span> @enderror
                        </div>
                        <div class="w-full">
                            <x-label for="estado">Estado</x-label>
                            <x-selectcolor wire:model="estado"  id="estado" disabled>
                                @foreach ($entidades as $entidad)
                                <option value="0"> Creada </option>
                                <option value="1"> Iniciada </option>
                                <option value="2"> Finalizada </option>
                                <option value="3"> Cancelada </option>
                                @endforeach
                            </x-selectcolor>

                            @error('estado') <span class="text-red-500 error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="flex space-x-1 ">
                        <div class="w-full">
                            <x-label for="fechainicio">Fecha Inicio</x-label>
                            <x-inputblue type="date" wire:model="fechainicio" class="w-full " id="fechainicio" name="fechainicio" disabled/>
                            @error('fechainicio') <span class="text-red-500 error">{{ $message }}</span> @enderror
                        </div>
                        <div class="w-full">
                            <x-label for="fechafin">Fecha Finalización</x-label>
                            <x-inputblue type="date" wire:model="fechafin" class="w-full " id="fechafin" name="fechafin"  disabled/>
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
                            <x-inputblue type="date" wire:model="fechainstal1"  id="fechainstal1" name="fechainstal1"  disabled/>
                            <x-selectcolor wire:model="montaje1"  id="montaje1"  disabled>
                                <option value="">-Selecciona-</option>
                                <option value="M">Montaje</option>
                                <option value="D">Desmontaje</option>
                            </x-selectcolor>
                        </div>
                        <div class="flex items-center w-full space-x-2 ">
                            <x-label for="fechainstal2" class="w-1/12">Fecha</x-label>
                            <x-inputblue type="date" wire:model="fechainstal2" id="fechainstal2" name="fechainstal2"  disabled/>
                            <x-selectcolor wire:model="montaje2"  id="montaje2"  disabled>
                                <option value="">-Selecciona-</option>
                                <option value="M">Montaje</option>
                                <option value="D">Desmontaje</option>
                            </x-selectcolor>
                        </div>
                        <div class="flex items-center w-full space-x-2 ">
                            <x-label for="fechainstal3" class="w-1/12">Fecha</x-label>
                            <x-inputblue type="date" wire:model="fechainstal3" id="fechainstal3" name="fechainstal3"  disabled/>
                            <x-selectcolor wire:model="montaje3" id="montaje3"  disabled>
                                <option value="">-Selecciona-</option>
                                <option value="M">Montaje</option>
                                <option value="D">Desmontaje</option>
                            </x-selectcolor>
                        </div>
                    </div>
                </div>
                <div class="flex mt-2 mb-2 ml-2 space-x-4">
                    <div class="space-x-3">
                        <x-secondary-button  onclick="location.href = '{{route('campaign.index')}}'">{{ __('Volver') }}</x-secondary-button>
                    </div>
                </div>
            </form>
        <div>
    </div>
</div>
