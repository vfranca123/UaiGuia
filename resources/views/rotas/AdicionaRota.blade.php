@extends('layout.layout2')
@section('content')
    <h1 class="text-black">Criando rotas</h1>

    @if (count($locais) > 0)
        <form action="{{ route('RotasStore.index') }}" class="d-flex w-50 flex-column" method="POST" enctype="multipart/form-data">
            @csrf
            <h3 class="text-black">Nome:</h3>
            <div class="input-group input-group-lg m-2">
                <input type="text" class="form-control" aria-label="Sizing example input" name="nome" aria-describedby="inputGroup-sizing-lg">
            </div>

            <hr class="text-black">
            
            @foreach ($locais as $local)
            {{ $local->links_escolha($local) }}
            @endforeach
            
            <input type="submit" class="btn btn-warning w-50 align-self-center m-2" value="Cadastrar">
        </form>
    @else
        <h1 class="m-4 text-warning">Nenhum local encontrado</h1>
    @endif
@endsection
