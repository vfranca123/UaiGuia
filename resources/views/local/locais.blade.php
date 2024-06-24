@extends('layout.layoutInicial')
@section('content')
    <h1 class="text-black">locais</h1>

    @if (count($locais) > 0)
        @foreach ($locais as $local)
            
                {{ $local->links($local) }}
                
        @endforeach
    @else
        <h1 class="m-4 text-white">nenhum local encontrado</h1>
    @endif
@endsection
