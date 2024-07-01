<div class="modal fade" id="eventoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <a href="#" data-bs-dismiss="modal" class="text-decoration-none text-black m-3">x</a>

            <div class="d-flex flex-column justify-content-center align-items-center m-3">
                <h1 class="text-black">{{ $evento->nome}}</h1>
                <div class="d-flex w-50"><strong class="text-black">Data:</strong><p class="text-primary">{{ $evento->data }}</p></div>
                <div class="d-flex w-50"><strong class="text-black">local:</strong><p class="text-primary">{{ $evento->local }}</p></div>
                <div class="d-flex w-50"><strong class="text-black">descriçao:</strong><p class="text-primary">{{ $evento->descricao }}</p></div>
                <div class="d-flex w-50"><strong class="text-black">Taxa de entrada:</strong><p class="text-primary">{{ $evento->taxa_de_entrada }}$</p></div>
                <div class="d-flex w-50"><strong class="text-black">Segmento:</strong><p class="text-primary">{{ $evento->segmento }}</p></div>
                <img src="{{$evento->getImageURL()}}" alt="Img" class="card" style="width: 15rem;">
                
            </div>
        </div>
    </div>
</div>
