@extends('layout.layout2')

@section('content')
   
<div id="map"></div>

    <script>
        var map = L.map('map').setView([0, 0], 2);
        L.tileLayer('https://api.maptiler.com/maps/streets-v2/{z}/{x}/{y}.png?key=CdkPPSlQHKE0XNsbrqWJ', {
            attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>'
        }).addTo(map);

      
        @foreach ($locais as $local)
        
            var endereco{{$local->endereco}} = {{$local->endereco}};
            console.log(endereco);
             
          
            const url{{$local->endereco}} = `https://nominatim.openstreetmap.org/search?format=json&q=${endereco }`;

            fetch(url{{$local->endereco}})
                .then(response => response.json())
                .then(data => {
                    if (data.length > 0) {
                        const latitude = data[0].lat;
                        const longitude = data[0].lon;
                        console.log(`Latitude: ${latitude}, Longitude: ${longitude}`);

                        
                        L.marker([latitude, longitude]).addTo(map).bindPopup('{{ $local->nome_local }}').openPopup();
                    } else {
                        console.log('Endereço não encontrado para: {{ $local->endereco }}');
                    }
                })
                .catch(error => {
                    console.error('Erro ao buscar coordenadas:', error);
                });
                
        @endforeach
    </script>
@endsection

