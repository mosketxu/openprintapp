<div class="flex ml-10 space-x-2">
    @can('campaign.index')
    <div class="w-8">
        <div class="w-6 ml-2 ">
            <x-icon.tents-a href="{{route('campaign.index') }}" class="h-8 text-orange-600" title="Campañas"/>
        </div>
    </div>
    @endcan
    @can('campaign.edit')
    <div class="w-8">
        <div class="w-6 ml-2 ">
            <x-icon.campground-a href="{{route('campaign.edit',$campaign) }}" class="h-8 text-green-500" title="Campaña Actual"/>
        </div>
    </div>
    <div class="items-center w-8">
        <div class="items-center w-5 ml-2">
            <x-icon.heading-solid-a href="{{route('campaign.cabecera',$campaign) }}" class="w-5 text-lime-600" title="Cabecera"/>
        </div>
    </div>
    @endcan
    @can('import.index')
    <div class="items-center w-8">
        <div class="items-center w-4 ml-2 ">
            <x-icon.cloud-arrow-up-a href="{{route('import.index',$campaign) }}" class="w-5 text-purple-500" title="Importación"/>
        </div>
    </div>
    @endcan
    @can('campaign.index')
    <div class="items-center w-8">
        <div class="items-center w-5 ml-2 ">
            <x-icon.store-a href="{{route('campaign.stores',$campaign) }}" class="w-5 text-yellow-500" title="Stores"/>
        </div>
    </div>
    <div class="items-center w-8">
        <div class="items-center w-5 ml-2 ">
            <x-icon.cubes-a href="{{route('campaign.elementos',$campaign) }}" class="w-5 text-gray-500" title="Elementos"/>
        </div>
    </div>
    <div class="items-center w-8 h-8">
        <div class="items-center w-8 py-1.5 ml-2 border-2 border-red-100 rounded-lg">
            <x-icon.store-cubes-a href="{{route('campaign.storeelementos',$campaign) }}" class="w-16 text-orange-500" title="Elementos x tienda"/>
        </div>
    </div>
    @endcan
    <div class="items-center w-8 h-8">
        <div class="w-5 ml-2 ">
            <x-icon.sigma-a href="{{route('campaign.elementosQ',$campaign) }}" class="w-5 text-teal-500" title="Totales Elementos Campaña"/>
        </div>
    </div>
    <div class="items-center w-8 h-8">
        <div class="w-5 ml-2 ">
            <x-icon.tags-a href="{{route('campaign.etiquetaspdf',$campaign) }}" class="w-5 text-fuchsia-600" title="Etiquetas PDF"/>
        </div>
    </div>
    @if(Route::currentRouteName()=='campaign.edit')
    @can('campaign.delete')
    <div class="items-center w-8 h-8">
        <div class="w-5 ml-auto ">
            <x-icon.trash-a wire:click.prevent="delete({{ $campaign->id }})" onclick="confirm('¿Estás seguro?') || event.stopImmediatePropagation()"  class="w-5 text-red-500" title="Eliminar"/>
            </div>
        </div>
    @endcan
    @endif
</div>
