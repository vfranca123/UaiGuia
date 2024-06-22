@extends('layout.layoutInicial')
@section('content')
    @if (Auth::user()->tipo_de_conta === 'adm')
        <h1 class="text-black">Local</h1>
        <form action="{{ route('local.store') }}" class="d-flex flex-column w-50" method="POST" enctype="multipart/form-data">
            @csrf

            <h3 class="text-black">Nome Do Local:</h3>
            <div class="input-group input-group-lg">
                <input type="text" class="form-control" aria-label="Sizing example input" name="nome_local"
                    aria-describedby="inputGroup-sizing-lg">
            </div>

            <h3 class="text-black">Endereço:</h3>
            <div class="input-group input-group-lg">
                <input type="text" class="form-control" aria-label="Sizing example input" name="endereco"
                    aria-describedby="inputGroup-sizing-lg">
            </div>
            <h3 class="text-black">Descrição:</h3>
            <div class="input-group input-group-lg">
                <input type="text" class="form-control" aria-label="Sizing example input" name="descricao"
                    aria-describedby="inputGroup-sizing-lg">
            </div>
            <h3 class="text-black">Taxa De Entrada:</h3>
            <div class="input-group input-group-lg">
                <input type="number" class="form-control" aria-label="Sizing example input" name="taxa_de_entrada"
                    aria-describedby="inputGroup-sizing-lg">
            </div>

            <h3 class="text-black">Segmento </h3>
            <div class="input-group">
                <select class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon"
                    name="segmento">
                    <option value="Cultural">Cultural</option>
                    <option value="Natural">Natural</option>
                    <option value="Religioso">Religioso</option>
                    <option value="Gastronomico">Gastronomico</option>
                </select>

            </div>
            <input type="submit" class="btn btn-warning w-50 align-self-center m-2" value="Cadastrar">
        </form>
    @else
        <h1 class="text-warning">Voce deve ser adiministrador para poder registrar locais</h1>
        <a href="{{ route('locais.index') }}" type="button" class="btn btn-primary text-decoration-none m-4">Voltar</a>
    @endif
@endsection
