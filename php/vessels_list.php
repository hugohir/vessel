<!--****************************************************************************
// Filename: vessels_list.php
// Author: Hugo Hiraoka  (c) Copyright
// Date: 2022 January
// Description: retrieves all vessels list
*****************************************************************************-->

<?php
session_start();

#define array to store data
$array_CruiserList = array();

#retrieve data from database if available
$sqli_listVessels = "SELECT * FROM Vessels";
$resulti_listVessels = $conn->query($sqli_listVessels);

#store in data in array if available
  if ($resulti_listVessels -> num_rows > 0) {
      while($row = $resulti_listVessels->fetch_assoc()){
        $array_CruiserList[] = $row;
      }
      echo '<script>console.log("Vessels list loaded successfully"); </script>';
  }
  else
  {
    echo '<script>console.log("Error! Vessels list could not be loaded."); </script>';
    echo "No vessels found.";
  }

$_SESSION['vesselsList'] = $array_CruiserList;
?>
