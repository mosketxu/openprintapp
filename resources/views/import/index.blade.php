<x-app-layout>
    <div class="">
        <div class="h-full p-1 mx-2">
            <h1 class="text-2xl font-semibold text-gray-900">Importación de datos para la campaña: {{$campaign->name}}
            </h1>
                <div class="">
                    @include('error')
                </div>
                <div class="flex justify-between">
                    <div class="flex w-10/12 space-x-3">
                        {{-- @include('campaign.campaignfilters') --}}
                    </div>
                    @can('campaign.create')
                    <div class="flex flex-row-reverse w-2/12">
                        <div class="pt-3">
                        </div>
                    </div>
                    @endcan
                </div>
                <div class="w-full space-y-2 lg:flex lg:space-x-2 lg:space-y-0">
                    @livewire('import.import',['campaign'=>$campaign],key($campaign->id))
                </div>
            </div>
        </div>
        <div class="m-3">
            <x-secondary-button  onclick="location.href = '{{ route('campaign.edit',$campaign) }}'">{{ __('Volver') }}</x-secondary-button>
        </div>
    </div></x-app-layout>
