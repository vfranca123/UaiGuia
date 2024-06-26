@extends('layout.layoutInicial')
@section('content')
    <h1 class="text-black">Eventos</h1>

    @if (count($eventos) > 0)
        @foreach ($eventos as $evento)
            {{ $evento->links($evento) }}
        @endforeach
    @else
        <h1 class="m-4 text-warning">nenhum evento encontrado</h1>
    @endif
    </div>
@endsection
