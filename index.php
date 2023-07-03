<!-- ****************************************************************************
Author: Hugo Hiraoka (c) 2022 January
FilenWatchame: index.php
Description: Cruise Tracker Application
**************************************************************************** -->

<!DOCTYPE html>

<?php
session_start();

//configures database
include_once "php/dbconfig.php";

//handles cruiser and company data
include "php/cruisecompany.php";

//makes a list of vessels
include "php/vessels_list.php";

//auto complete search
include "php/vesselDashCompany.php";

//handles last position of vessel
include "php/lastPositionVessel.php";

//handles teleport data
include "php/teleport.php";

//handles port information
include "php/ports.php";

//header includes menu
include_once "php/header.php";

//handles satellite data
include "php/satellite.php";

//create arrays and retrieve data from _SESSIONS

//Cruise and Company from cruisecompany.php
$arrayCruiselineCompanies = $_SESSION['cruiseCompanyList'];

//List of vessels from vessels_list.php
$arrayAllCruisers = $_SESSION['vesselsList'];

//position of vessels from lastPositionVessel.php
$arrayLastPositions= $_SESSION['lastPositionsList'];

//teleport from teleport.php
$arrayTeleports = $_SESSION['teleports'];

//list of arrays from ports.php
$arrayPorts = $_SESSION['arrayPorts'];

//List of arrays from satellite.
$arraySatellites = $_SESSION['satellites'];

//Dunno what this is... can't remember, couldn't find
$arrayCruisers = $_SESSION['cruisers'];

//Dunno what this is... can't remember, couldn't find
$arrayVL = $_SESSION['arrayVlength'];

//print_r($arrayPorts);
//echo "index.php arrayVL is ". $arrayVL;
//print_r($arrayAllCruisers);

?>

<html lang="en">
<head>

	<title>CSC Cruise Tracker</title>
	<meta charset="utf-8">
	<meta name = "viewport" content="width = device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="icon" type="image/x-icon" href="images/icons/favicon.ico">
  <link rel="shortcut icon" type="image/x-icon" href="images/icons/favicon.ico">
  <link rel="apple-touch-icon" sizes="180x180" href="images/icons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="images/icons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="images/icons/favicon-16x16.png">
  <link rel="manifest" href="site.webmanifest">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://kit.fontawesome.com/66c29ee338.js" crossorigin="anonymous"></script>
	<script src="https://Jancdn.polyfill.io/v2/polyfill.min.js?features=Promise"></script>
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">

	<link rel="stylesheet" href="css/leaflet.css"/>
	<link rel="stylesheet" href="css/leaflet-geoman.css">
	<link rel="stylesheet" href="css/iconLayers.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/mwasil/Leaflet.Rainviewer/leaflet.rainviewer.css">
	<link rel="stylesheet" href="css/leaflet-rainviewer.css"/>
	<link rel="stylesheet" href="css/style.css">
	<script src="js/leaflet.js"></script>
	<script src="js/leaflet-geoman.min.js"></script>

	<!-- custom js -->
	<script src="js/mylocation.js"></script>
	<!--<script src="js/worldtime.js"></script> -->
	<script src="js/l-control-icon.js"></script>
	<script src="js/teleports.js"></script>
	<script src="js/ports.js"></script>
	<script src="js/companymmsiposition.js"></script>
	<script src="js/clock_time.js"></script>
	<!-- <script src="https://cdn.jsdelivr.net/gh/mwasil/Leaflet.Rainviewer/leaflet.rainviewer.js"></script> -->
	<script src="js/leaflet-rainviewer.js"></script>
	<script src="js/satellite_geoJSON.js"></script>
	<script src="js/satellites.js"></script>
	<script src="js/radar.js"></script>
	<script src="js/rotatedMarker.js"></script>
	<script src="js/l.Donut.js"></script>
	<!--<script src="js/leaflet_daynight.js"></script>-->
	<!--<script src="js/daynight.js"></script>-->
	<script src="js/bing.js"></script>
	<script src="js/mapbackgrounds.js"></script>

</head>

<body>

	<main class = "main-content">
	<!--<div class="fixed-top">-->
	<!--<div class="container-fluid" style="padding-top: 140px"> -->
	<!-- <div class="detail-image-container" style="padding-top: 140px"> -->

	<div class= "col-12" style="padding-top: 1px">

		<div class="row">
			<!-- <img class= "thumbnail-image" src="images/boat-1.jpg" width=120px alt "Boat"> -->
					<div id='map' style="width:100vw; height:75vh"> </div>

						<script>
						var map = L.map('map', {noWrap: true, maxZoom: 19, minZoom: 3.3, zoomControl: false }).setView([24.34541, -76.598297],5);
						//map.options.minZoom = 19;
						//map.options.maxZoom = 10;
						//Layer variables
						var regular = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {noWrap:true, maxZoom: 19}).addTo(map);

						var southWest = L.latLng(-90, -180),
						northEast = L.latLng(90, 180);
						var bounds = L.latLngBounds(southWest, northEast);

						map.setMaxBounds(bounds);
						map.on('drag', function() {
						map.panInsideBounds(bounds, { animate: false });
						});

						//var southWest = L.latLng(88,-180),
						//    northEast = L.latLng(-88, 180),
						//    bounds = L.latLngBounds(southWest, northEast);
						//L.PM.setOptIn(true); //set to false to disable
						//var map = L.map('map', {
						//	maxBounds: bounds,
						//	center: [24.34541, -76.598297],
						//	maxZoom: 19,
						//zoomSnap: 0.1
						//minZoom: 2.9
						//	minZoom: 2.9
						//});
						//map.fitBounds(bounds);

						var popup = L.popup();

						function onMapClick(e) {
		      		popup
		          .sbs3aetLatLng(e.latlng)
		          .setContent("Coordinates: " + e.latlng.toString())
		          .openOn(map);
		  			};

						//	map.pm.addControls({
						//	  position: 'topleft',
						//	  drawCircle: false,
						//	});

					map.on('pm:create', function(e) {
				  var coords = e.layer.getLatLngs();
				  console.log(coords);
				});

					map.on('click', onMapClick);

					//L.control.radar({}).addTo(map);

					/*L.control.rainviewer({
							position: 'topleft',
							nextButtonText: '>',
							playStopButtonText: 'Play/Stop',
							prevButtonText: '<',
							positionSliderLabelText: "Hour:",
							opacitySliderLabelText: "Opacity:",
							animationInterval: 2000,
							opacity: 0.5
					}).addTo(map);
					*/
					//const time_ny =
					//getTime();

					//console.log("temp1s: "+temp1s);
					//const mytime = JSON.parse(time01);
					//document.getElementById("demo").innerHTML = mytime.datetime;
					//console.log("NY Time is : ");console.log(time_ny);

					//images for zoomIn and zoomOutText
					var zoomInImg = '<img src="images/icons/zoom_in_map.png" alt="Zoom In" style="width: 120%; height: 156%">';
					var zoomOutImg = '<img src="images/icons/zoom_out_map.png" alt="Zoom Out" style="width: 90%; height: 100%">';

					// zoom control options
					var zoomOptions = {
   						zoomInText : zoomInImg,
   						zoomOutText : zoomOutImg,
					};

					// Creating zoom control
					var zoom = L.control.zoom(zoomOptions);

					zoom.addTo(map).setPosition('topright');

					//bring up controls to add/remove layer: satellites (js: satellites.js)
					satelliteLayers(<?php echo json_encode($arraySatellites);?>);

					//bring up control to add/remove layer teleports (js: teleport.js)
					teleportLayers(<?php echo json_encode($arrayTeleports);?>);

					//bring up the controls to add/remove Cruisers by company: cruise companies (js: cruiseliners.js)
					cruiselineCompanyLayers(<?php echo json_encode($arrayLastPositions)?>,
																	<?php echo json_encode($arrayAllCruisers)?>,
																	<?php echo json_encode($arrayCruiselineCompanies)?>);

					//bring up cpntrols to add/remove Map backgrounds (js: mapbackgrounds.js)
					setMapBackgrounds();

					//portLayers(<?php //echo json_encode($arrayPorts);?>);

					//bring up the control of the rainviewer on the screen
					L.control.rainviewer({position: 'topleft'}).addTo(map);
					//console.log("time is "+ time_a);

					//bring up the control of the rainviewer on the screen
					L.control.Radar({position: 'topleft'}).addTo(map);
					//console.log("time is "+ time_a);

			//dayNight();



			</script>

			<!-- </div> -->

	</div>

	</div>
	</main>

	<iframe id="timeFrame" height="150" frameborder="0"></iframe>

  <script>
    // Function to update the time every second
    function updateTime() {
      var currentTime = new Date();
      var formattedTime = currentTime.toLocaleTimeString();

      // Update the content of the iframe
      var iframe = document.getElementById('timeFrame');
      iframe.contentDocument.body.innerHTML = formattedTime;
    }

    // Call the updateTime function every second
    setInterval(updateTime, 1000);
  </script>
</body>

<footer>
</footer>

</html>
