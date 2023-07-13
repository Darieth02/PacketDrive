// map.js
function initMap() {
    const map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: 37.7749, lng: -122.4194 },
        zoom: 13,
    });

    const input = document.getElementById('calle');
    const autocomplete = new google.maps.places.Autocomplete(input);

    // Rellenar los campos del formulario cuando se selecciona una dirección
    autocomplete.addListener('place_changed', function () {
        const place = autocomplete.getPlace();
        if (!place.geometry) {
            window.alert("No se encontró la dirección seleccionada.");
            return;
        }

        const addressComponents = {
            calle: '',
            numero: '',
            colonia: '',
            municipio: '',
            estado: '',
            pais: '',
            codigo_postal: ''
        };

        for (const component of place.address_components) {
            const componentType = component.types[0];
            switch (componentType) {
                case 'street_number':
                    addressComponents.numero = component.long_name;
                    break;
                case 'route':
                    addressComponents.calle = component.long_name;
                    break;
                case 'sublocality_level_1':
                case 'neighborhood':
                    addressComponents.colonia = component.long_name;
                    break;
                case 'locality':
                    addressComponents.municipio = component.long_name;
                    break;
                case 'administrative_area_level_1':
                    addressComponents.estado = component.long_name;
                    break;
                case 'country':
                    addressComponents.pais = component.long_name;
                    break;
                case 'postal_code':
                    addressComponents.codigo_postal = component.long_name;
                    break;
            }
        }

        // Rellenar los campos del formulario con la dirección seleccionada
        document.getElementById('calle').value = addressComponents.calle;
        document.getElementById('numero').value = addressComponents.numero;
        document.getElementById('colonia').value = addressComponents.colonia;
        document.getElementById('municipio').value = addressComponents.municipio;
        document.getElementById('estado').value = addressComponents.estado;
        document.getElementById('pais').value = addressComponents.pais;
        document.getElementById('codigo_postal').value = addressComponents.codigo_postal;

        // Centrar el mapa en la ubicación seleccionada
        map.setCenter(place.geometry.location);
        map.setZoom(15);
    });
}
