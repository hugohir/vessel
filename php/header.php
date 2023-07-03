<!--****************************************************************************
// Filename: Header.p]lh
// Author: Hugo Hiraoka  (c) Copyright
// Date: 2022 January
// Description: Header items for CSC Cruise Tracker
*****************************************************************************-->
<?PHP
session_start();
include "vessels_companies.php";
include "vesselDashCompany.php";
#include "setup.php";
$listOfVessels = $_SESSION['listVessels'];
$arrayVesselNameDashCompany = $_SESSION['listVesselDashCompany'];
?>

<html>
<head>
  <script src="js/autocomplete.js"></script>
  <script src="//widget.time.is/en.js"></script>
  <script src="js/mylocation.js"></script>
</head>

<body>

<!-- top banner -->
<div class ="container-fluid p-0">
  <img id = "topBanner" class="img-fluid" src="images/banners/tp_noon.png" alt="Miami Teleport">
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">

  <!--Navigation container-->
  <div class="container-fluid">

    <!--menu container-->
    <div class="d-flex align-items-center">
      <a class="navbar-brand" href="#">
        <img src="images/logos/csc_logo.jpg" alt="CSC Logo" style="width:40px;" class="rounded-pill">
      </a>

      <!-- Nav bar -->
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">

        <!-- Companies -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Companies</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#" data-toggle="modal" data-target='#modal'>All</a></li>
              <li><hr class="dropdown-divider"></hr></li>
              <li><a class="dropdown-item" href="#">By First Letter</a></li>
              <li><hr class="dropdown-divider"></hr></li>
              <li><a class="dropdown-item" href="#">Search</a></li>
            </ul>
          </li>

        <!--Vessels-->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Vessels</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">All</a></li>
              <li><hr class="dropdown-divider"></hr></li>
              <li><a class="dropdown-item" href="#">By Company</a></li>
              <li><a class="dropdown-item" href="#">By First Letter</a></li>
              <li><a class="dropdown-item" href="#">By Flag</a></li>
              <li><a class="dropdown-item" href="#">By Year</a></li>
              <li><hr class="dropdown-divider"></hr></li>
              <li><a class="dropdown-item" href="#">Search"></a></li>
            </ul>
          </li>

        <!-- Menu Teleports -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Teleports</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">All</a></li>
            <li><hr class="dropdown-divider"></hr></li>
            <li><a class="dropdown-item" href="#">Shortlist</a></li>
            <li><a class="dropdown-item" href="#">Region</a></li>
            <li><a class="dropdown-item" href="#">Country</a></li>
          </ul>
        </li>

        <!-- Menu Ports -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="modal" data-bs-target="#portsModal">Ports</a>
        </li>

      <!-- Ports Modal -->
      <!--<div class="modal fade" id="portsModal" tabindex="-1" aria-labelledby="portsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="portsModalLabel">Select Ports</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
                <div class="modal-body">
                  <form id="portsFor">
                  <div class="mb-3">
                    <input type="checkbox" id="port1" name="port" value="Port 1">
                    <label for="port1">Port 1</label>
                  </div>
                  <div class="mb-3">
              <input type="checkbox" id="port2" name="port" value="Port 2">
              <label for="port2">Port 2</label>
            </div>
             Add more checkbox elements for each port -->
      <!--   </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" onclick="displaySelectedPorts()">Apply</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<script>

function displaySelectedPorts() {
  const portsForm = document.getElementById("portsForm");
  const checkboxes = portsForm.elements.port;

  for (let i = 0; i < checkboxes.length; i++) {
    const checkbox = checkboxes[i];
    const portName = checkbox.value;
    const isChecked = checkbox.checked;

    // Add your logic here to display or hide ports on the map based on checkbox state
    if (isChecked) {
      // Display port on the map
      console.log(`Display port "${portName}" on the map`);
    } else {
      // Hide port from the map
      console.log(`Hide port "${portName}" from the map`);
    }
  }
}

</script>
-->
        <!-- Menu Weather Radar -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Weather Radar</a>
          <div class="dropdown-menu">
            <label class="dropdown-item"><input type="radio" name="radar-option" value="black-white"> Black and White</label>
            <label class="dropdown-item"><input type="radio" name="radar-option" value="original"> Original</label>
            <label class="dropdown-item"><input type="radio" name="radar-option" value="universal-blue"> Universal Blue</label>
            <label class="dropdown-item"><input type="radio" name="radar-option" value="titan"> TITAN</label>
            <label class="dropdown-item"><input type="radio" name="radar-option" value="weather-channel"> The Weather Channel</label>
            <label class="dropdown-item"><input type="radio" name="radar-option" value="meteored"> Meteored</label>
            <label class="dropdown-item"><input type="radio" name="radar-option" value="nexrad-level-iii"> NEXRAD Level III</label>
            <label class="dropdown-item"><input type="radio" name="radar-option" value="rainbow-selex-si"> RAINBOW @ SELEX-SI</label>
            <label class="dropdown-item"><input type="radio" name="radar-option" value="dark-sky"> Dark Sky</label>
          </div>
        </li>

        <script>
          // Get all radio buttons within the dropdown menu
          var radioButtons = document.querySelectorAll('.dropdown-menu input[type="radio"]');

          // Add event listener to each radio button
          radioButtons.forEach(function(radioButton) {
            radioButton.addEventListener('change', function() {
              // Close the dropdown menu when a radio button is selected
              var dropdownMenu = this.closest('.dropdown-menu');
              var dropdownToggle = dropdownMenu.previousElementSibling;
              dropdownToggle.classList.remove('show');
              });
            });
          </script>

          <!--Menu Setup -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Setup</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">All</a></li>
              <li><hr class="dropdown-divider"></hr></li>
              <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#vesselModal">Vessels</a></li>
              <li><a class="dropdown-item" href="#">Ports</a></li>
              <li><hr class="dropdown-divider"></hr></li>
              <li><a class="dropdown-item" href="#">Map</a></li>
            </ul>
          </li>

          <!-- Menu About -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">About</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Help</a></li>
              <li><hr class="dropdown-divider"></hr></li>
              <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#aboutModal">About</a></li>
            </ul>
          </li>
        </ul>

<!--
        <form class="d-flex">
          <input class="form-control me-2" type="text" placeholder="Search">
          <button class="btn btn-primary" type="button">Search</button>
        </form>
-->
        <form autocomplete="off" method='get' class='ajaxform' action="php/cruiser.php">
        <div class="d-inline-flex align-items-center">
          <div class="autocomplete" style="width:200px">
            <input id="myCruise" type="text" name="ship" placeholder="Cruiseliner">
          </div>
          <div>
            <input type="submit" value="Search">
          </div>
        </div>
        </form>

      </div> <!--nav bar-->
    </div> <!-- menu container-->
  </div> <!-- navigation container -->
</nav> <!-- nav -->
</div> <!-- top header -->

<!-- Vessel Setup Modal -->
<div class="modal" id="vesselModal">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Select Vessels</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="aboutModal" tabindex="-1" aria-labelledby="aboutModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
      <div class="modal-header text-center align-items-center">
        <h5 class="modal-title m-auto" id="aboutModalLabel" style="font-family: Arial, sans-serif; font-weight: bold;">About</h5>
      </div>
      <div class="modal-body text-center">
        <img src="images/icons/vesselTracker_240px.png" alt="Vessel Tracker Logo">
        <p><p>Hugo Hiraoka</p>
        <a>hhiraoka1@gmail.com</a>
        <p style="font-family: Arial, sans-serif; font-weight: bold;">Vessel Tracker (c) 2023</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary mx-auto" data-bs-dismiss="modal" style="background-color: black; color: white;">OK</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>

<!-- javascript for time -->
<script>
       //var browserTime = locationTime();
       //console.log("Banner=" + banner);
       var alternateText;
       checkImage();
       //setInterval(checkImage, 90000);
       setInterval(checkImage, 5000);
       function checkImage() {
       browserTime = locationTime();
       //console.log(banner);
       //night
       if (browserTime == 0)
       {
         document.getElementById("topBanner").src = "images/banners/tp_night.png";
         //imageBanner = document.getElementById("images/banners/banner_night.jpg";
         //alternateText = "Miami Teleport Night";
         //<img class="img-fluid" src="images/banners/banner_night.jpg" alt="Miami Teleport Night">;
       }
       else if (browserTime == 1)
       {
         document.getElementById("topBanner").src = "images/banners/tp_morning.png";
         //alternateText = "Miami Teleport Morning";
         //<img class="img-fluid" src="images/banners/banner_morning.jpg" alt="Miami Teleport Morning">;
       }
       else if (browserTime == 2)
       {
         document.getElementById("topBanner").src = "images/banners/tp_noon.png";
         //alternateText = "Miami Teleport Noon";
         //<img class="img-fluid" src="images/banners/banner_noon.jpg" alt="Miami Teleport Noon">;
       }
       else if (browserTime == 3)
       {
         document.getElementById("topBanner").src = "images/banners/tp_afternoon.png";
         //alternateText = "Miami Teleport Afternoon";
         //<img class="img-fluid" src="images/banners/banner_afternoon.jpg" alt="Miami Teleport Afternoon">;
       }
       else//include_once "php/header.php";
       {
         document.getElementById("topBanner").src = "images/general/tp_noon.png";
         //alternateText = "Miami Teleport";
         //<img class="img-fluid" src="images/general/csc_miami_teleport_1920x40_banner_max.jpg" alt="Miami Teleport Night">; }
       }
       //document.write('<img class="img-fluid" src='+ imageBanner +' alt=' + alternateText + '>');
       //<img id = "topBanner" class="img-fluid" src= document.write('"' + imageBanner + '" alt ="' + alternateText+'"')> ;
       //markerColorShadow(browserTime);
     }

     </script>
