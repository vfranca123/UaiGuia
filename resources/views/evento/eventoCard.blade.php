<div class="card w-50 mb-3 d-flex flex-row">
    <div class="card-body">
        <h5 class="card-title">{{ $evento->nome }}</h5>
        <p class="card-text">{{ $evento->descricao }}</p>
    </div>
    <div class="align-self-center">
        <button class="text-primary bg-white border-0" type="button" data-bs-toggle="modal" data-bs-target="#eventoModal"><i class="fa-regular fa-eye fs-3"></i></button>
    </div>
</div>

@include('evento.eventoPopOver')
