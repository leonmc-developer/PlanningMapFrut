<style>
      /* El mapa ocupará todo el espacio disponible */
    #map {
      height: 100%;  /* Mapa ocupará toda la altura de la pantalla */
      width: 100%;   /* Mapa ocupará todo el ancho de la pantalla */
    }
  </style>
<div class="container-fluid py-2" >
      <div class="row">
        <div class="ms-3" style="height: 100vh;">
          <h3 class="mb-0 h4 font-weight-bolder">MAPA</h3>
          <p class="mb-4">
            Check the sales, value and bounce rate by country.
          </p>

          <div id="map"></div>

  <!-- Cargar la API de Google Maps con tu clave de API -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA_sDer-8vN5_TLOEiZpb6yOAhdK3Nwnjw&callback=initMap" async defer></script>

  <script>
    // Función para inicializar el mapa
    function initMap() {
      // Coordenadas proporcionadas -18.163574964042155, -63.80329149285002
      var myLatLng = { lat: -18.163574964042155, lng: -63.80329149285002 };

      // Crear un nuevo mapa centrado en las coordenadas
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 21,  // El nivel de zoom (puedes ajustarlo si es necesario)
        center: myLatLng, // Coordenadas donde se centrará el mapa
        //mapTypeId: google.maps.MapTypeId.SATELLITE,
        styles: [
        { elementType: "geometry", stylers: [{ color: "#212121" }] },
        { elementType: "labels.text.stroke", stylers: [{ color: "#212121" }] },
        { elementType: "labels.text.fill", stylers: [{ color: "#757575" }] },
        { featureType: "road", elementType: "geometry", stylers: [{ color: "#373737" }] }
    ]
      });

      // Definir las coordenadas del polígono rectangular
      var rectangleCoords = [
        { lat: -18.163279331289505, lng: -63.803298868926994 },  // Esquina superior izquierda -18.163279331289505, -63.803298868926994
        { lat: -18.16377810001784, lng: -63.80311044370675 },  // Esquina superior derecha -18.16358133543084, -63.80311044370675
        { lat: -18.16369283469969, lng: -63.80344974315759 },  // Esquina inferior derecha  -18.16369283469969, -63.80344974315759
        { lat: -18.163508064443985, lng: -63.80359793521025 },  // Esquina inferior izquierda  -18.163508064443985, -63.80359793521025
      ];

      // Crear el polígono rectangular
      var rectangle = new google.maps.Polygon({
        paths: rectangleCoords,  // Coordenadas del polígono
        strokeColor: '#FF0000',  // Color del borde del polígono
        strokeOpacity: 0.8,      // Opacidad del borde
        strokeWeight: 2,         // Grosor del borde
        //fillColor: '#FF0000',    // Color de relleno del polígono
        //fillOpacity: 0.35        // Opacidad del relleno
      });

      // Añadir el polígono al mapa
      rectangle.setMap(map);

      // Crear un círculo pequeño dentro del rectángulo
      var circle = new google.maps.Circle({
        center: myLatLng,  // Coordenadas centradas en el rectángulo
        radius: 0.5,  // Radio en metros (puedes ajustarlo)
        strokeColor: '#00FF00',  // Color del borde del círculo
        strokeOpacity: 0.8,      // Opacidad del borde
        strokeWeight: 2,         // Grosor del borde
        fillColor: '#00FF00',    // Color de relleno del círculo
        fillOpacity: 0.35        // Opacidad del relleno
      });

      // Añadir el círculo al mapa
      circle.setMap(map);

      // Crear un infowindow (popup) que se abrirá cuando se haga clic en el polígono
      var infowindow = new google.maps.InfoWindow({
        content: '<h3>Polígono Rectangular</h3><p>Este es un polígono rectangular en el mapa.</p>'
      });

      // Añadir un listener para abrir el infowindow al hacer clic en el polígono
      google.maps.event.addListener(rectangle, 'click', function(event) {
        infowindow.setPosition(event.latLng);
        infowindow.open(map);
      });
    }
  </script>
  
        </div>        
      </div>
</div>      
