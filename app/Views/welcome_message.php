<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mapa con Google Maps</title>
  <style>
    /* Asegúrate de que el cuerpo y html ocupen todo el espacio disponible */
    html, body {
      height: 100%;
      margin: 0;
    }

    /* El mapa ocupará todo el espacio disponible */
    #map {
      height: 100%;  /* Mapa ocupará toda la altura de la pantalla */
      width: 100%;   /* Mapa ocupará todo el ancho de la pantalla */
    }
  </style>
  <?php 
  if(isset($css_files))
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
</head>
<body>
<div>
		<a href='<?php echo site_url('terrenos')?>'>Terreno</a> |
	</div>
  <h1 style="text-align: center; color: white;">Mapa con Google Maps - Vista Satélite</h1>
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
        mapTypeId: google.maps.MapTypeId.SATELLITE
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
<div style='height:20px;'></div>  
    <div style="padding: 10px">
		<?php  
    if(isset($output))
    echo $output; 
   ?>
    </div>
    <?php 
    if(isset($js_files))
    foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>
</body>
</html>
