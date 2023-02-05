<!DOCTYPE html>

<?php
session_start();
include 'cruiser.php';
$vessel_array = $_SESSION['vesselArray'];
?>
<!-- Hugo Hiraoka @2022 -->

<html lang="en">

<head>
  <title>CSC Vessel Tracker</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/66c29ee338.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
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
            <button type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown">Teleports</button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" onclick="javascript:#">Miami</a></li>
                <li><a class="dropdown-item" onclick="javascript:#">Alpine</a></li>
                <li><a class="dropdown-item" onclick="javascript:#">Europe</a></li>
              </ul>
          </div>
      <form autocomplete="off" action="/cruiser.php">
        <div class="autocomplete" style="width:300px;">
          <input id="myCruise" type="text" name="ship" placeholder="Cruiseliner">
        </div>
        <input type="submit">
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
      var vessels = <?php echo json_encode($vessel_array); ?>;

      /*initiate the autocomplete function on the "myCruise" element, and pass along the vessels array as possible autocomplete values:*/
      autocomplete(document.getElementById("myCruise"), vessels);
      </script>

    </ul>
  </div>

</nav>


<div class="p-0 bg-primary text-white text-center">


  <iframe width="1920" height="640" frameborder="0" scrolling="no"
marginheight="0" marginwidth="0"
src="https://www.openstreetmap.org/export/embed.html?bbox=-114.800520%2C39.479307%2C-34.336653%2C9.677466&amp;layer=mapnik&amp;marker=25.83754%2C-80.24901"
style="border: 1px solid black"></iframe>
<br/><small>
<a href="https://www.openstreetmap.org/?mlat=25.892022&amp;mlon=-64.574318#map=12/25.892022/-64.574318">
View Larger Map</a></small>
</div>

<script

{
       const map = L.map('leaflet-js-map').setView([46.231226, 6.051737], 14);
       L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
           minZoom: 0,
           maxZoom: 20,
           attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors'
       }).addTo(map);
       const leafletMarkers = L.layerGroup([
           new L.marker([46.233226, 6.055737]),
           new L.marker([46.2278, 6.0510]),
           new L.marker([46.23336, 6.0471])
       ]);
       leafletMarkers.addTo(map);
   }



script/>

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


<div class="mt-5 p-4 bg-dark text-white text-center">
  <p>Footer</p>
</div>


</body>
</html>
