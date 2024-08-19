@if(!$entidad->entidad_id)
    <div class="w-2/12 text-xs">
        <label class="px-1 text-gray-600">
            Cliente
        </label>
        <div class="flex">
            <select wire:model.lazy="filtroentidad" class="w-full py-2 text-xs text-gray-600 bg-white border-blue-300 rounded-md shadow-sm appearance-none hover:border-gray-400 focus:outline-none">
                <option value="">--Selecciona Cliente--</option>
                @foreach ($entidades as $entidad)
                <option value="{{ $entidad->id }}">{{ $entidad->entidad }}</option>
                @endforeach
            </select>
        </div>
    </div>
@endif
<div class="w-2/12 text-xs">
    <label class="px-1 text-gray-600">
        Campaña
    </label>
    <div class="flex">
        <input type="search" wire:model.lazy="search" class="w-full py-2 text-xs text-gray-600 placeholder-gray-300 bg-white border-blue-300 rounded-md shadow-sm appearance-none hover:border-gray-400 focus:outline-none" placeholder="Búsqueda Campaña" autofocus/>
    </div>
</div>
<div class="w-2/12 text-xs">
    <label class="px-1 text-gray-600">
        Estado
    </label>
    <div class="flex">
        <select wire:model.lazy="filtroestado" class="w-full py-2 text-xs text-gray-600 bg-white border-blue-300 rounded-md shadow-sm appearance-none hover:border-gray-400 focus:outline-none">
            <option value="">--Selecciona Estado--</option>
            <option value="0">Creada</option>
            <option value="1">Iniciada</option>
            <option value="2">Finalizada</option>
            <option value="3">Cancelada</option>
        </select>
    </div>
</div>

