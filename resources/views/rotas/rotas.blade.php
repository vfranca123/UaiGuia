@extends('layout.layout2')
@section('content')
    <h1 class="text-black">Minhas rotas</h1>
   
    @if ($rotas->count() > 0)
        @foreach ($rotas as $rota)
            @include('rotas.rotaCard')
        @endforeach
    @else
        <h1 class="m-4 text-warning">Nenhuma rota encontrada</h1>
    @endif
@endsection