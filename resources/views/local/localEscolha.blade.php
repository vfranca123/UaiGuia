<div class="card w-50 mb-3 d-flex flex-column">
    <h5 class="card-title m-2">{{ $local->nome_local }}</h5>
    <p class="card-text">{{ $local->descricao }}</p>
    <input class="form-check-input fs-2 m-1 mt-2" type="checkbox" name="locais_id" value="{{$local->id }}">
</div>