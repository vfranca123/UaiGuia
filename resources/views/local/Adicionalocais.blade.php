@extends('layout.layout2')
@section('content')
    @if (Auth::user()->tipo_de_conta === 'adm')
        <h1 class="text-black">Local</h1>
        <form action="{{ route('local.store') }}" class="d-flex flex-column w-50" method="POST" enctype="multipart/form-data">
            @csrf
            

            <h3 class="text-black">Endereço:</h3>
            <div class="input-group input-group-lg">
                <input type="text" class="form-control" aria-label="Sizing example input" name="endereco"
                    aria-describedby="inputGroup-sizing-lg">
            </div>
            
            <h3 class="text-black">Foto</h3>
            <label for="uploadphoto" class="btn btn-secondary bg-secondary w-25"
            style="--bs-btn-padding-y: 1.5rem;">
                <i class="fa-solid fa-plus fs-2"></i>
            </label>
            <input type="file" accept="image/*" class="form-control d-none" id="uploadphoto" name="img">

            <input type="submit" class="btn btn-warning w-50 align-self-center m-2" value="Cadastrar">
        </form>
    @else
        <h1 class="text-warning">Voce deve ser adiministrador para poder registrar locais</h1>
        <a href="{{ route('locais.index') }}" type="button" class="btn btn-primary text-decoration-none m-4">Voltar</a>
    @endif
@endsection
