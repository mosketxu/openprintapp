<x-app-layout>
    <div class="p-2">
        <div class="max-w-full mx-auto">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                @livewire('campaign.campaign-elemento',['campaignElemento'=>$campaignElemento,key($campaignElemento->id)])
            </div>
        </div>
    </div>
</x-app-layout>
