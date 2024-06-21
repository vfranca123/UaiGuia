@extends('layout.layoutInicial')
@section('content')

    @include('shared.flash')
    <h1 class="text-black">Login</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('login.authenticate') }}" class="d-flex flex-column w-50">
        @csrf
        <h2 class="text-black align-self-start mt-5">Email</h2>
        <div class="input-group input-group-lg">
            <input type="email" class="form-control" aria-label="Sizing example input" name="email"
                aria-describedby="inputGroup-sizing-lg">
        </div>

        <h2 class="text-black align-self-start mt-5">Senha</h2>
        <div class="input-group input-group-lg">
            <input type="password" class="form-control" aria-label="Sizing example input" name="password"
                aria-describedby="inputGroup-sizing-lg">
        </div>
        <input type="submit" class="btn btn-warning w-50 align-self-center m-2" value="Entrar">
    </form>


    <a href="{{ route('cadastro.index') }}" class="text-center">Cadastrar</a>
    </div>
@endsection
