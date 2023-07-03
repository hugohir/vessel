<!--************************************************************************
// Filename: satellite.php
// Author: Hugo Hiraoka (c) 2022
// Description: retrieves satellite information from database
//************************************************************************-->

<?php
session_start();

//define an  array
$satelliteList= array();

//get satellite data from database
$sqli_listSatellites = "SELECT * FROM Satellites";
$resulti_listSatellites = $conn->query($sqli_listSatellites);

//store into array if data is retrieved successfully
if ($resulti_listSatellites -> num_rows >0){
  while($row = $resulti_listSatellites->fetch_assoc()){
    $satelliteList[] = $row;
  }
  echo '<script>console.log("Satellite data loaded successfully.");</script>';
}
else {
    echo '<script>console.log("Error! Satellite data could not be loaded.");</script>';
    echo '<script>console.log("No satellites found.");</script>';
    }

$_SESSION['satellites']=$satelliteList;
?>
