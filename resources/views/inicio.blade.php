@extends('layout.layoutInicial')
@section('content')
    <h1 class="text-black fs-1 m-2">Bem Vindo ao UaiGuia</h1>
    <p class="text-black fs-2">
        Nosso app oferece as melhores rotas para <br>
        &nbsp;melhorar aninda mais suas experiencias <br>
        &nbsp;&nbsp;&nbsp; turistivas em São João Del-Rei MG!</p>
    
    <div class="gap-5 d-md-flex justify-content-lg-evenly">
        <button class="btn btn-primary" type="button" data-bs-toggle="modal"data-bs-target="#loginModal">Entrar</button>
        <button class="btn btn-primary" type="button" data-bs-toggle="modal"data-bs-target="#cadastroModal">Cadastar</button>
    </div>

    
    @include('login.loginPopOver')
    @include('cadastro.cadastroPopOver')
@endsection