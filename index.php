<!-- ****************************************************************************
Author: Hugo Hiraoka (c) 2022 January
FilenWatchame: index.php
Description: Cruise Tracker Application
**************************************************************************** -->

<!DOCTYPE html>

<?php
session_start();
include_once "php/dbconfig.php";
include "php/vesselDashCompany.php";

include "php/teleport.php";
include "php/cruisecompany.php";
include "php/vessels_list.php";
include "php/lastPositionVessel.php";
include_once "php/header.php";
include "php/ports.php";


$arrayTeleports = $_SESSION['teleports'];
$arrayCruiselineCompanies = $_SESSION['cruiseCompanyList'];
$arrayCruisers = $_SESSION['cruisers'];
$arrayAllCruisers = $_SESSION['vesselsList'];
$arrayLastPositions= $_SESSION['lastPositionsList'];
$arrayVL = $_SESSION['arrayVlength'];
$arrayPorts = $_SESSION['arrayPorts'];
//print_r($arrayPorts);
 //echo "index.php arrayVL is ". $arrayVL;
 //print_r($arrayAllCruisers);

?>

<html lang="en">
<head>

	<title>CSC Cruise Tracker</title>
	<meta charset="utf-8">

  <link rel="icon" type="image/x-icon" href="images/icons/favicon.ico">
  <link rel="shortcut icon" type="image/x-icon" href="images/icons/favicon.ico">
  <link rel="apple-touch-icon" sizes="180x180" href="images/icons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="images/icons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="images/icons/favicon-16x16.png">
  <link rel="manifest" href="site.webmanifest">


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://kit.fontawesome.com/66c29ee338.js" crossorigin="anonymous"></script>
	<script src="https://Jancdn.polyfill.io/v2/polyfill.min.js?features=Promise"></script>
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

  <link rel="stylesheet" href="css/leaflet.css"/>
  <script src="js/leaflet.js"></script>

	<link rel="stylesheet" href="css/leaflet-geoman.css">
	<link rel="stylesheet" href="css/iconLayers.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/mwasil/Leaflet.Rainviewer/leaflet.rainviewer.css">
	<link rel="stylesheet" href="css/leaflet-rainviewer.css"/>

	<link rel="stylesheet" href="css/style.css">


	<script src="js/mylocation.js"></script>
	<script src="js/worldtime.js"></script>

	<script src="js/leaflet-geoman.min.js"></script>
	<script src="js/l-control-icon.js"></script>

	<script src="js/teleports.js"></script>
	<!--<script src="js/ports.js"></script> -->

	<script src="js/clock_time.js"></script>

<!-- <script src="https://cdn.jsdelivr.net/gh/mwasil/Leaflet.Rainviewer/leaflet.rainviewer.js"></script> -->
<script src="js/leaflet-rainviewer.js"></script>


	<script src="js/satellite_geoJSON.js"></script>
	<script src="js/satellites.js"></script>
	<script src="js/radar.js"></script>
	<script src="js/companymmsiposition.js"></script>
	<script src="js/rotatedMarker.js"></script>
	<script src="js/l.Donut.js"></script>
	<!--<script src="js/leaflet_daynight.js"></script>-->
	<!--<script src="js/daynight.js"></script>-->
	<script src="js/bing.js"></script>

	<script src="js/mapbackgrounds.js"></script>

</head>

<body>

<!--<div class="fixed-top">-->
<div class="container-fluid" style="padding-top: 140px">
	<div class="row">
	<!--	<div class="col-1">
	</div> -->
		<!-- <div class="col-2">

<!-- <div class="container-fluid" style="padding-top: 80px"> -->
<div id='map'> </div>
<!-- </div> -->
<!--</div>-->
<script>

var map = L.map('map', {maxZoom: 19, minZoom: 1.5 }).setView([24.34541, -76.598297],5);

//map.options.minZoom = 19;
//map.options.maxZoom = 10;


//Layer variables
var regular = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {noWrap:true, maxZoom: 19}).addTo(map);

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


//
var popup = L.popup();

function onMapClick(e) {
      popup
          .sbs3aetLatLng(e.latlng)
          .setContent("Coordinates: " + e.latlng.toString())
          .openOn(map);
  }

//	map.pm.addControls({
//	  position: 'topleft',
//	  drawCircle: false,
//	});

	map.on('pm:create', function(e) {
  var coords = e.layer.getLatLngs();
  console.log(coords);
});

map.on('click', onMapClick);

L.control.radar({}).addTo(map);

L.control.rainviewer({
		position: 'topright',
		nextButtonText: '>',
		playStopButtonText: 'Play/Stop',
		prevButtonText: '<',
		positionSliderLabelText: "Hour:",
		opacitySliderLabelText: "Opacity:",
		animationInterval: 500,
		opacity: 0.5
}).addTo(map);

//const time_ny =
//getTime();

//console.log("temp1s: "+temp1s);
//const mytime = JSON.parse(time01);
//document.getElementById("demo").innerHTML = mytime.datetime;
//console.log("NY Time is : ");console.log(time_ny);

satelliteLayers();
teleportLayers(<?php echo json_encode($arrayTeleports);?>);
cruiselineCompanyLayers(<?php echo json_encode($arrayLastPositions);?>,

<?php echo json_encode($arrayAllCruisers);?>,
<?php echo json_encode($arrayCruiselineCompanies);?>);

setMapBackgrounds();
//portLayers(<?php //echo json_encode($arrayPorts);?>);

//console.log("time is "+ time_a);



$(window).on("resize", function() {
    $("#map").height($(window).height()).width($(window).width());
    map.invalidateSize();
}).trigger("resize");
//dayNight();

</script>

<!-- </div> -->
</div>
</div>

</body>

<footer>
<?php ?>

</footer>

</html>
