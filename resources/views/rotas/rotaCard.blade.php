
<div class="card w-50 mb-3 d-flex flex-row">
    <div class="card-body">
        <h5 class="card-title m-2">{{ $rota->nome }}</h5>
        <p class="card-text">Quantidade de destinos: {{ $rota->quantidade_destinos }}</p>
        @foreach ($rota->locais as $local)
            <p class="card-text">Local: {{ $local->nome_local }}</p>
        @endforeach
    </div>
    <div class="align-self-center">
        <a href="{{route('map',$rota)}}"><i class="fa-regular fa-eye fs-3"></i></a>
    </div>
</div>


