@extends('layout.layoutInicial')
@section('content')
    <h1 class="text-black">Cadastro</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('cadastro.store') }}" class="d-flex flex-column w-50" method="POST" enctype="multipart/form-data">
        @csrf

        <h3 class="text-black">Nome:</h3>
        <div class="input-group input-group-lg">
            <input type="text" class="form-control" aria-label="Sizing example input" name="nome"
                aria-describedby="inputGroup-sizing-lg">
        </div>

        <h2 class="text-black">Fone:</h2>
        <div class="input-group input-group-lg">
            <input type="number" class="form-control" aria-label="Sizing example input" name="fone"
                aria-describedby="inputGroup-sizing-lg">
        </div>

        <h3 class="text-black">Email:</h3>
        <div class="input-group input-group-lg">
            <input type="email" class="form-control" aria-label="Sizing example input" name="email"
                aria-describedby="inputGroup-sizing-lg">
        </div>

        <h3 class="text-black">Senha:</h3>
        <div class="input-group input-group-lg">
            <input type="password" class="form-control" aria-label="Sizing example input" name="senha"
                aria-describedby="inputGroup-sizing-lg">
        </div>
        
        <h3 class="text-black">Tipo de conta</h3>
        <div class="input-group">
            <select class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon" name="tipo_de_conta">
              <option value="turista">Turista</option>
              <option value="adm">Adiministrador</option>
            </select>
            
        </div>

        <input type="submit" class="btn btn-warning w-50 align-self-center m-2" value="Cadastrar">
    </form>
    <button  type="button" class="btn btn-link" data-bs-toggle="modal"data-bs-target="#loginModal">Entrar</button>
    @include('login.loginPopOver')

@endsection
