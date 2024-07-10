@extends('layout.layoutInicial')
@section('content')
    <h1 class="text-black">Eventos</h1>


    @if (count($eventos) > 0)
        <div class="container">
            <div class="row d-flex justify-content-center bg-success p-2 text-dark bg-opacity-10">
                <div class="col-12 bg-success p-2 text-dark bg-opacity-10">
                    <div class="card bg-success p-2 text-dark bg-opacity-10">
                        <div class="card-body bg-success p-2 text-dark bg-opacity-10">
                            <div class="overflow-auto" style="max-height: 70vh;">
                                @if (count($eventos) > 0)
                                    @foreach ($eventos as $evento)
                                        {{ $evento->links($evento) }}
                                    @endforeach
                                @else
                                    <h1 class="m-4 text-warning">Nenhum local encontrado</h1>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <h1 class="m-4 text-warning">nenhum evento encontrado</h1>
    @endif
    </div>
@endsection
