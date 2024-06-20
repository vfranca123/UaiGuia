@extends('layout.layoutInicial')
@section('content')
    <h1 class="text-black fs-1 m-2">Bem Vindo ao UaiGuia</h1>
    
    <p class="text-black fs-2">Bem-vindo a São João del-Rei e ao UaiGuia!
        Crie rotas turísticas, de acordo <br>com sua preferência e com a ajuda de IA, 
        para ter uma experiência mais intensa e relevante!
    </p>

    <div class="gap-5 d-md-flex justify-content-lg-evenly">
        <button class="btn btn-primary" type="button" data-bs-toggle="modal"data-bs-target="#loginModal">Entrar</button>
        <button class="btn btn-primary" type="button" data-bs-toggle="modal"data-bs-target="#cadastroModal">Cadastar</button>
    </div>


    @include('login.loginPopOver')
    @include('cadastro.cadastroPopOver')
@endsection
