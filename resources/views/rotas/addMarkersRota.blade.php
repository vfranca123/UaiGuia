<script>
    var localizacoes = [];
    var comparacao = {{ count($locais) }};
    var map = L.map('map').setView([0, 0], 2);

    L.tileLayer('https://api.maptiler.com/maps/streets-v2/{z}/{x}/{y}.png?key=CdkPPSlQHKE0XNsbrqWJ', {
        attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a>'
    }).addTo(map);

    var apiKey = '5b3ce3597851110001cf6248c774d6007b794ba4adf6d6cbbcf38a25';

    function getCoordinate(position, comando) {
        if (comando === 'lat') {
            return position.coords.latitude;
        } else {
            return position.coords.longitude;
        }
    }

    function drawRoute(start, end) {
        var url =
            `https://api.openrouteservice.org/v2/directions/driving-car?api_key=${apiKey}&start=${start[1]},${start[0]}&end=${end[1]},${end[0]}`;

        return fetch(url)
            .then(response => response.json())
            .then(data => {
                if (data.features && data.features.length > 0) {
                    var routeCoordinates = data.features[0].geometry.coordinates.map(coord => [coord[1], coord[0]]);
                    var route = L.polyline(routeCoordinates, {
                        color: 'blue'
                    }).addTo(map);
                    map.fitBounds(route.getBounds());
                } else {
                    console.error('Nenhuma rota encontrada');
                }
            })
            .catch(error => console.error('Error:', error));
    }

    var promises = [];

    @foreach ($locais as $index => $local)
        var endereco = "{{ $local->endereco }}";
        const url{{ $index }} = `https://nominatim.openstreetmap.org/search?format=json&q=${endereco}`;

        var promise{{ $index }} = fetch(url{{ $index }})
            .then(response => response.json())
            .then(data => {
                if (data.length > 0) {
                    const latitude = parseFloat(data[0].lat);
                    const longitude = parseFloat(data[0].lon);
                    localizacoes.push([latitude, longitude]);
                    L.marker([latitude, longitude]).addTo(map).bindPopup('{{ $local->endereco }}');
                } else {
                    console.log('Endereço não encontrado para: {{ $local->endereco }}');
                }
            })
            .catch(error => console.error('Erro ao buscar coordenadas:', error));

        promises.push(promise{{ $index }});
    @endforeach

    navigator.geolocation.getCurrentPosition(function(position) {
        var cordenadUsuarioLatitude = getCoordinate(position, 'lat');
        var cordenadUsuarioLongitude = getCoordinate(position, 'lon');

        // Adiciona um marcador ao mapa na posição do usuário
        L.marker([cordenadUsuarioLatitude, cordenadUsuarioLongitude]).addTo(map).bindPopup('Você').openPopup();
        localizacoes.unshift([cordenadUsuarioLatitude, cordenadUsuarioLongitude]);

        Promise.all(promises).then(() => {
            if (localizacoes.length >= 2) {
                var drawPromises = [];
                for (var i = 0; i < localizacoes.length - 1; i++) {
                    let start = localizacoes[i];
                    let end = localizacoes[i + 1];

                    drawPromises.push(drawRoute(start, end));
                }

                Promise.all(drawPromises).then(() => {
                    console.log('Rota completa desenhada');
                }).catch(error => console.error('Erro ao desenhar rotas:', error));
            } else {
                console.error('Coordenadas insuficientes para traçar a rota');
            }
        }).catch(error => console.error('Erro ao aguardar todas as promessas:', error));
    }, function(error) {
        console.error('Erro ao obter a localização do usuário:', error);
    });
</script>
