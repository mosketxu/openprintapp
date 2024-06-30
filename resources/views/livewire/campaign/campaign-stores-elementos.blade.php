<div>
    <div class="">
        <h1>Elementos por Tienda - Campaña: {{ $campaign->name }}</h1>
    </div>

    @foreach ($stores as $store)
    <div>
        <h3>{{ $store->store }}</h3>
        <ul>
            @foreach($store->elementos as $elemento)
                <li>
                    {{ $elemento->imagen }} - Quantity: {{ $elemento->pivot->cantidad }}
                </li>
            @endforeach
        </ul>
    </div>
    @endforeach
</div>
