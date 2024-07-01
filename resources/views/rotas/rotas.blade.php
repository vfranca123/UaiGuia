@extends('layout.layout2')
@section('content')
    <h1 class="text-black">Minhas rotas</h1>
   
    @if (auth()->user()->rotas()->count() > 0)
        @foreach (auth()->user()->rotas() as $rota)
            {{ $rota->links($rota) }}
        @endforeach
    @else
        <h1 class="m-4 text-warning">nenhuma rota encontrado</h1>
    @endif
@endsection
