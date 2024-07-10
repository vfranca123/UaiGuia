@extends('layout.layout2')
@section('content')
    <h1 class="text-black">Criando rotas</h1>

    @if (count($locais) > 0)
        <form action="{{ route('RotasStore.index') }}" class="d-flex w-50 flex-column" method="POST"
            enctype="multipart/form-data">
            @csrf
            <h3 class="text-black">Nome:</h3>
            <div class="input-group input-group-lg m-2">
                <input type="text" class="form-control" aria-label="Sizing example input" name="nome"
                    aria-describedby="inputGroup-sizing-lg">
            </div>

            <hr class="text-black">
            <div class="container">
                <div class="row d-flex justify-content-center bg-success p-2 text-dark bg-opacity-10">
                    <div class="col-12 bg-success p-2 text-dark bg-opacity-10">
                        <div class="card bg-success p-2 text-dark bg-opacity-10">
                            <div class="card-body bg-success p-2 text-dark bg-opacity-10">
                                <div class="overflow-auto" style="max-height: 70vh;">
                                    @if (count($locais) > 0)
                                        @foreach ($locais as $local)
                                            {{ $local->links_escolha($local) }}
                                        @endforeach
                                    @else
                                        <h1 class="m-4 text-warning">Nenhum local encontrado</h1>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          

            <input type="submit" class="btn btn-warning w-50 align-self-center m-2" value="Cadastrar">
        </form>
    @else
        <h1 class="m-4 text-warning">Nenhum local encontrado</h1>
    @endif
@endsection
