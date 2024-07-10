<div class="card w-100 mb-3 d-flex flex-row">
    <div class="card-body">
        <h5 class="card-title">{{ $local->nome_local }}</h5>
    </div>
    <div class="align-self-center">
        <button class="text-primary bg-white border-0" type="button" data-bs-toggle="modal" data-bs-target="#localModal">exibir</button>
    </div>
</div>

@include('local.localPopOver')

