<!DOCTYPE html>

<?php
session_start();
include_once "dbconfig.php";
//include "cruiser.php";
include "vessels_list.php";
//include "teleport.php";

$listOfVessels = $_SESSION['listVessels'];
$testvar = $_SESSION['test'];
$cruiser = $_SESSION['vname'];
$company = $_SESSION['vcompany'];
$mmsid =$_SESSION['MMSI'];
$imo = $_SESSION['IMO'];
$callname = $_SESSION['CALLNAME'];
$flag = $_SESSION['FLAG'];
$yearbuilt = $_SESSION['YEARBUILT'];
$vesselength = $_SESSION['VESSEL_LENGTH'];
$vesselbeam = $_SESSION['VESSEL_BEAM'];
$vesselimage = $_SESSION['VESSEL_IMAGE'];
$vesselgwt = $_SESSION['VESSEL_GWT'];
$latitude = $_SESSION['platitude'];
$longitude = $_SESSION['plongitude'];
$ship_picture_file = $_SESSION['VESSEL_IMAGE'];
//echo $cruiser;
//echo $company;
//echo $latitude."-".$longitude;
?>

<!-- Hugo Hiraoka @2022 -->

<html lang="en">

<head>
  <title>CSC Vessel Tracker</title>
  <link rel="icon" type="image/x-icon" href="/favicon.ico">
  <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
  <link rel="manifest" href="site.webmanifest">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="leaflet-geoman.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

  <script type="text/javascript" src="jquery-version.js"></script>
  <script type="text/javascript" src="ajaxform.js"></script>

  <script src="https://kit.fontawesome.com/66c29ee338.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

  <script src="radar.js"></script>


  </head>

<body>
<div class="bg-primary text-white text-center">
  <img class="img-fluid" src="img/banner_top_140.png" alt="CSC Teleport">
  <div class="bg-dark text-white text-center sticky-top">
    <nav class="container-fluid navbar navbar-expand-md navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="javascript:void(0)"><img src="img/csclogo.jpg" alt="CSC Logo" style="width:40px;" class="rounded-pill"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">
          <div class="btn-group">
            <button type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown">Cruiselines</button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" onclick="javascript:#">Carnival</a></li>
                <li><a class="dropdown-item" onclick="javascript:#">Celebrity</a></li>
                <li><a class="dropdown-item" onclick="javascript:#">MSC</a></li>
                <li><a class="dropdown-item" onclick="javascript:#">Royal Caribbean</a></li>
                <li><a class="dropdown-item" onclick="javascript:#">All</a></li>
              </ul>
          </div>

          <div class="btn-group">
            <button type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown">Layers</button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" onclick="javascript:#">Weather</a></li>
                <li><a class="dropdown-item" onclick="javascript:#">NA</a></li>
                <li><a class="dropdown-item" onclick="javascript:#">NA</a></li>
              </ul>
          </div>

          <div class="btn-group">
            <button type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown">Satellites</button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" onclick="javascript:#">Sat A</a></li>
                <li><a class="dropdown-item" onclick="javascript:#">Sat B</a></li>
                <li><a class="dropdown-item" onclick="javascript:#">Sat C</a></li>
              </ul>
          </div>


          <div class="btn-group">
            <button type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown">Teleports</button>
              <ul class="dropdown-menu">
                <li><input type = "checkbox" id="tp01" checked="true" onclick="tpFunction()">
                  <label for="tp01">CSC Miami</label>
                <li><input type = "checkbox" id="tp02" onclick="tpFunction()">
                  <label for="tp02">Alpine NJ</label>
                <li><input type = "checkbox" id="tp03" onclick="tpFunction()">
                  <label for="tp03">Horizons Deu</label>
              </ul>
          </div>

          <script>
            var tp, tp01, tp02, tp03;

            function tpFunction(){
              var checkBox1 = document.getElementById("tp01");
              var checkBox2 = document.getElementById("tp02");
              var checkBox3 = document.getElementById("tp03");

              if (checkBox1.checked == true)
              {
                var tp01_on_off = "on";
              }
              else
              {
                var tp01_on_off = "off";
                //remove teleport icon
              }

              if (checkBox2.checked == true)
              {
                tp = 12;
                //then get data for teleport
                teleport2_icon_on_off(tp);
              }
              else
              {
                teleport2_icon_on_off(0);
              }

              if (checkBox3.checked == true)
              {
                var tp03_on_off = "on";
              }
              else
              {
                var tp03_on_off = "off";
              }
            }


          </script>

      <form autocomplete="off" method='get' class='ajaxform' action="/cruiser.php">
        <div class="autocomplete" style="width:200px;">
          <input id="myCruise" type="text" name="ship" placeholder="Cruiseliner">
        </div>
        <input type="submit" value="Search">
      </form>

      <script type="text/javascript">
      function autocomplete(inp, arr) {
        /*the autocomplete function takes two arguments,
        the text field element and an array of possible autocompleted values:*/
        var currentFocus;
        /*execute a function when someone writes in the text field:*/
        inp.addEventListener("input", function(e) {
            var a, b, i, val = this.value;
            /*close any already open lists of autocompleted values*/
            closeAllLists();
            if (!val) { return false;}
            currentFocus = -1;
            /*create a DIV element that will contain the items (values):*/
            a = document.createElement("DIV");
            a.setAttribute("id", this.id + "autocomplete-list");
            a.setAttribute("class", "autocomplete-items");
            /*append the DIV element as a child of the autocomplete container:*/
            this.parentNode.appendChild(a);
            /*for each item in the array...*/
            for (i = 0; i < arr.length; i++) {
              /*check if the item starts with the same letters as the text field value:*/
              if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                /*create a DIV element for each matching element:*/
                b = document.createElement("DIV");
                /*make the matching letters bold:*/
                b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                b.innerHTML += arr[i].substr(val.length);
                /*insert a input field that will hold the current array item's value:*/
                b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                /*execute a function when someone clicks on the item value (DIV element):*/
                b.addEventListener("click", function(e) {
                    /*insert the value for the autocomplete text field:*/
                    inp.value = this.getElementsByTagName("input")[0].value;
                    /*close the list of autocompleted values,
                    (or any other open lists of autocompleted values:*/
                    closeAllLists();
                });
                a.appendChild(b);
              }
            }
        });
        /*execute a function presses a key on the keyboard:*/
        inp.addEventListener("keydown", function(e) {
            var x = document.getElementById(this.id + "autocomplete-list");
            if (x) x = x.getElementsByTagName("div");
            if (e.keyCode == 40) {
              /*If the arrow DOWN key is pressed,
              increase the currentFocus variable:*/
              currentFocus++;
              /*and and make the current item more visible:*/
              addActive(x);
            } else if (e.keyCode == 38) { //up
              /*If the arrow UP key is pressed,
              decrease the currentFocus variable:*/
              currentFocus--;
              /*and and make the current item more visible:*/
              addActive(x);
            } else if (e.keyCode == 13) {
              /*If the ENTER key is pressed, prevent the form from being submitted,*/
              e.preventDefault();
              if (currentFocus > -1) {
                /*and simulate a click on the "active" item:*/
                if (x) x[currentFocus].click();
              }
            }
        });
        function addActive(x) {
          /*a function to classify an item as "active":*/
          if (!x) return false;
          /*start by removing the "active" class on all items:*/
          removeActive(x);
          if (currentFocus >= x.length) currentFocus = 0;
          if (currentFocus < 0) currentFocus = (x.length - 1);
          /*add class "autocomplete-active":*/
          x[currentFocus].classList.add("autocomplete-active");
        }
        function removeActive(x) {
          /*a function to remove the "active" class from all autocomplete items:*/
          for (var i = 0; i < x.length; i++) {
            x[i].classList.remove("autocomplete-active");
          }
        }
        function closeAllLists(elmnt) {
          /*close all autocomplete lists in the document,
          except the one passed as an argument:*/
          var x = document.getElementsByClassName("autocomplete-items");
          for (var i = 0; i < x.length; i++) {
            if (elmnt != x[i] && elmnt != inp) {
              x[i].parentNode.removeChild(x[i]);
            }
          }
        }
        /*execute a function when someone clicks in the document:*/
        document.addEventListener("click", function (e) {
            closeAllLists(e.target);
        });
      }

      /*An array containing all the cruiseliners names in the database*/
      var vessels = <?php echo json_encode($listOfVessels); ?>;

      /*initiate the autocomplete function on the "myCruise" element, and pass along the vessels array as possible autocomplete values:*/
      autocomplete(document.getElementById("myCruise"), vessels);
      </script>


  </div>

  <a href="https://time.is/UTC" id="time_is_link" rel="nofollow" style="font-size:12px">UTC:</a>
  <span id="UTC_za00" style="font-size:18px"></span>
  <script src="//widget.time.is/en.js"></script>
  <script>
  time_is_widget.init({UTC_za00:{template:"TIME<br>DATE", date_format:"dayname, monthname dnum, year"}});
  </script>

</nav>
</div>

<div id="map" style="width: 100%; height: 640px;"></div>

<script src="geoJSON.js" type="text/javascript"></script>


<script>





var map = L.map('map').setView([24.342541, -76.598297], 5);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);



var AntIcon = L.Icon.extend({
		options: {
			//shadowUrl: 'img/satant-icon_shadow.png',
			iconSize:     [24, 24],
			//shadowSize:   [50, 64],
			iconAnchor:   [12, 24],
			//shadowAnchor: [4, 62],
			popupAnchor:  [-3, -76]
		}
	});

/*
//class triangle icon
var triangleIcon = L.Icon({
        iconUrl:    'img/triangle_blue.png',
        shadowUrl:  'img/triangle_yellow.png',
        iconSize:     [38, 95],
        shadowSize:   [50,64],
        iconAnchor:   [22, 94],
        shadowAnchor: [4,62],
        popupAnchor:  [-3, -76]

});

var greenTriangle = new triangleIcon({iconUrl: 'img/triangle_green.png'});
var blueTriangle = new triangleIcon({iconUrl: 'img/triangle_blue.png'});
var yellowTriangle = new trianglecon({iconUrl: 'img/triangle_yellow.png'});
var orangleTriangle = new triangleIcon({iconUrl: 'img/triangle_orange.png'});
var brownTriangle = new triangleIcon({iconUrl: 'img/triangle_brown.png'});
*/


L.control.radar({}).addTo(map);

var popup = L.popup();

function onMapClick(e) {
      popup
          .setLatLng(e.latlng)
          .setContent("Coordinates: " + e.latlng.toString())
          .openOn(map);
  }

  map.on('click', onMapClick);
	var antennaIcon = new AntIcon({iconUrl: 'img/satant-icon_48.png'});

  //var veesselIcon = new antIcon({iconUrl: 'img/circle-red.png'});

var cscImg = '<img src="img/csc_teleport.jpg" height="50%" width="50%"/>';
var alpineImg='<img src="img/alpine_teleport.jpg" height="50%" width="50%"/>';


//SINGLE VESSEL------------------------ BEGIN

var jslat = <?php echo json_encode($latitude); ?>;
var jslon = <?php echo json_encode($longitude); ?>;
var jname = <?php echo json_encode($cruiser); ?>;
var jcompany =<?php echo json_encode($company); ?>;
var jMMSI =<?php echo json_encode($mmsid); ?>;

//var jvimgpath = '<img src=<?php echo json_encode($ship_picture_file,JSON_UNESCAPED_SLASHES)?>; height="50%" width="50%" />';


// TELEPORT SELECTION


function teleport2_icon_on_off(on_off) {

const xhttp = new XMLHttpRequest();

//get coordinates from db via ajaxform
xhttp.open("GET","teleport.php?tp="+on_off);
xhttp.send();

//  var teleport2[] = L.marker([40.9607,-73.9225]).addTo(map);
  //document.write("ALPINE ON");

}

/*
else {
  //var teleport2[1] = L.marker([40.9607,-73.9225],{icon:none}).addTo(map);
  //map.removeLayer(teleport2);
  //document.write("ALPINE OFF");

}
*/


var firstTeleport = L.marker([25.837367, -80.249145], {icon: antennaIcon}).bindPopup('I am a teleport.').addTo(map);
//var teleport1 = L.marker([25.837367, -80.249145],{icon:antennaIcon}).bindPopup("CSC Miami Teleport <br>"+cscImg).addTo(map);

//}

//document.write(jvimgpath);
//document.write(jslat);
//document.write(jslon);


//var singleVessel = L.marker([jslat,jslon],{icon:antennaIcon}).bindPopup("<br>" + jname + "</br>" + jcompany + "</br>" + jMMSI + "</br>" + jvimgpath + "</br>").openPopup().addTo(map);
  //{icon: vesselIcon}).bindPopup('I am a teleport.').addTo(map);

//SINGLE VESSEL----------------------- END

/*
var polygon = L.polygon([
      [51.509, -0.08],
      [51.503, -0.06],
      [51.51, -0.047]
  ]).addTo(map);
*/
function onEachFeature(feature, layer) {
  		var popupContent = '<p>I started out as a GeoJSON ' +
  				feature.geometry.type + ', but now I\'m a Leaflet vector!</p>';

  		if (feature.properties && feature.properties.popupContent) {
  			popupContent += feature.properties.popupContent;
  		}

  		layer.bindPopup(popupContent);
  	}






</script>





<!--
<div class="p-0 bg-primary text-white text-center">

  <iframe width="1920" height="640" frameborder="0" scrolling="no"
marginheight="0" marginwidth="0"
src="https://www.openstreetmap.org/export/embed.html?bbox=-114.800520%2C39.479307%2C-34.336653%2C9.677466&amp;layer=mapnik&amp;marker=25.83754%2C-80.24901"
style="border: 1px solid black"></iframe>
<br/><small>
<a href="https://www.openstreetmap.org/?mlat=25.892022&amp;mlon=-64.574318#map=12/25.892022/-64.574318">
View Larger Map</a></small>
</div>
-->
<!--

<div class="container mt-3">
  <div class="row">
    <div class="col-sm-1">
        <h3 class="mt-4"></h3>
      <p></p>
      <ul class="nav nav-pills flex-column">
        <li class="nav-item">
          <a class="nav-link active" href="#">Active</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Disabled</a>
        </li>
      </ul>
      <hr class="d-sm-none">
    </div>
    <div class="col-sm-8">
      <h2></h2>
      <h5></h5>
      </div>
    </div>
  </div>
</div>

-->

<div class="mt-5 p-4 bg-primary text-white text-center">
  <p> <?php echo "TESTVAR= ".$testvar. "TEST2= ".$_SESSION['test2'];?>
</p>
</div>


</body>
</html>
