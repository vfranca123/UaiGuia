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
    
        function addMarkersAndCalculateRoutes(userLatitude, userLongitude, locais) {
            L.marker([userLatitude, userLongitude]).addTo(map).bindPopup('Você').openPopup();
    
            locais.forEach(function(local, index) {
                var endereco = local.endereco;
                const url = `https://nominatim.openstreetmap.org/search?format=json&q=` + encodeURIComponent(endereco);
    
                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        if (data.length > 0) {
                            const latitude = data[0].lat;
                            const longitude = data[0].lon;
    
                            L.marker([latitude, longitude]).addTo(map).bindPopup(local.endereco);
    
                            const routeUrl = `https://api.openrouteservice.org/v2/directions/driving-car?api_key=5b3ce3597851110001cf6248c774d6007b794ba4adf6d6cbbcf38a25&start=${userLongitude},${userLatitude}&end=${longitude},${latitude}`;
    
                            fetch(routeUrl)
                                .then(response => response.json())
                                .then(data => {
                                    if (data.features && data.features.length > 0) {
                                        const routeCoordinates = data.features[0].geometry.coordinates;
                                        const polyline = L.polyline(routeCoordinates, { color: 'red' }).addTo(map);
                                        map.fitBounds(polyline.getBounds());
                                    } else {
                                        console.error('Erro ao calcular rota: dados da rota não encontrados');
                                    }
                                })
                                .catch(error => {
                                    console.error('Erro ao calcular rota:', error);
                                });
    
                        } else {
                            console.log('Endereço não encontrado para: ' + local.endereco);
                        }
                    })
                    .catch(error => {
                        console.error('Erro ao buscar coordenadas:', error);
                    });
            });
        }
    
        navigator.geolocation.getCurrentPosition(function(position) {
            var userLatitude = getCoordinate(position, 'lat');
            var userLongitude = getCoordinate(position, 'lon');
    
            var locais = {!! json_encode($locais) !!};
            addMarkersAndCalculateRoutes(userLatitude, userLongitude, locais);
        });
    </script>
    
    
    
@endsection
