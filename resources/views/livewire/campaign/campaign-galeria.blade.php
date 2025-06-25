<div class="p-2 border rounded-md shadow-md">
    @can('campaign.edit')
        <input type="file" id="file{{ $campelemento->id }}" class="sr-only" wire:model="imagenelemento" wire:loading.attr="disabled" />
    @endcan

    @if(file_exists( $ruta ))
    <label for="file{{ $campelemento->id }}" class="cursor-pointer">
        <img src="{{asset($ruta.'?'.time())}}" alt={{$campelemento->imagenelemento}} title={{$campelemento->imagenelemento}}
        class="{{ $altura }} mx-auto"/>
    </label>
    @else
    <label for="file{{ $campelemento->id }}" class="cursor-pointer">
        <img src="{{asset('storage/galeria/pordefecto.png')}}" alt={{$campelemento->imagenelemento}} title={{$campelemento->imagenelemento}}
        class="{{ $altura }} mx-auto"/>
    </label>
    @endif
    @error('imagenelemento') <span class="text-red-500">{{ $message }} </span>@enderror
        <!-- Spinner de carga -->
        <div wire:loading.flex class="fixed inset-0 z-50 flex items-center justify-center bg-gray-500 bg-opacity-75">
            <div class="spinner-border text-light" role="status">
                <span class="sr-only">Cargando...</span>
            </div>
        </div>
</div>

