@extends('layout.layout2')

@section('content')
    <div id="map"></div>

    <script>
        var map = L.map('map').setView([0, 0], 2);
        L.tileLayer('https://api.maptiler.com/maps/streets-v2/{z}/{x}/{y}.png?key=CdkPPSlQHKE0XNsbrqWJ', {
            attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>'
        }).addTo(map);

        function getCoordinate(position, comando) {
            if (comando === 'lat') {
                return position.coords.latitude;
            } else {
                return position.coords.longitude;
            }
        }
        navigator.geolocation.getCurrentPosition(function(position) {
            var cordenadUsuarioLatitude = getCoordinate(position, 'lat');
            var cordenadUsuarioLongitude = getCoordinate(position, 'lon');


            // Adiciona um marcador ao mapa na posição do usuário
            L.marker([cordenadUsuarioLatitude, cordenadUsuarioLongitude]).addTo(map).bindPopup('Você').openPopup();
            map.setView([cordenadUsuarioLatitude, cordenadUsuarioLongitude], 13);
        });

        {{ $i = 0 }}
        @foreach ($locais as $local)

            var endereco{{ $i }} = "{{ $local->endereco }}";

            const url{{ $i }} = `https://nominatim.openstreetmap.org/search?format=json&q=` +endereco{{ $i }};

            fetch(url{{ $i }})
                .then(response => response.json())
                .then(data => {
                    if (data.length > 0) {
                        const latitude = data[0].lat;
                        const longitude = data[0].lon;



                        L.marker([latitude, longitude]).addTo(map).bindPopup('{{ $local->endereco }}');
                    } else {
                        console.log('Endereço não encontrado para: {{ $local->endereco }}');
                    }
                })
                .catch(error => {
                    console.error('Erro ao buscar coordenadas:', error);
                });
            {{ $i++ }}
        @endforeach
        
    </script>
@endsection
