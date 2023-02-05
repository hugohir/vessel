<!--****************************************************************************
// Filename: vessels_list.php
// Author: Hugo Hiraoka  (c) Copyright
// Date: 2022 January
// Description: retrieves all vessels list
*****************************************************************************-->

<?php
session_start();

//get teleport data
$array_CruiserList = array();

$sqli_listVessels = "SELECT * FROM Vessels";
$resulti_listVessels = $conn->query($sqli_listVessels);

  if ($resulti_listVessels -> num_rows > 0) {
      while($row = $resulti_listVessels->fetch_assoc()){
        $array_CruiserList[] = $row;
      }
  }
  else
  {
    echo "0 results";
  }

$_SESSION['vesselsList'] = $array_CruiserList;
?>
