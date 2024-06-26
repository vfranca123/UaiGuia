<div class="modal fade" id="localModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <a href="#" data-bs-dismiss="modal" class="text-decoration-none text-black m-3">x</a>

            <div class="d-flex flex-column justify-content-center align-items-center m-3">
                <h1 class="text-black">{{ $local->nome_local }}</h1>
                <div class="d-flex w-50"><strong class="text-black">Endereço:</strong><p class="text-primary">{{ $local->endereco }}</p></div>
                <div class="d-flex w-50"><strong class="text-black">Segmento:</strong><p class="text-primary">{{ $local->segmento }}</p></div>
                <div class="d-flex w-50"><strong class="text-black">descriçao:</strong><p class="text-primary">{{ $local->descricao }}</p></div>
                <div class="d-flex w-50"><strong class="text-black">Taxa de entrada:</strong><p class="text-primary">{{ $local->taxa_de_entrada }}$</p></div>
                <img src="{{$local->getImageURL()}}" alt="Img" class="card" style="width: 15rem;">
            </div>
        </div>
    </div>
</div>
