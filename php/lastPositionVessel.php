<!--****************************************************************************
// Filename: lastPositionList.php
// Author: Hugo Hiraoka  (c) Copyright
// Date: 2022 January
// Description: retrieves the leatest Position of each vessel
*****************************************************************************-->

<?php

session_start();

//define array to store vessel position
$arrayLastPositionrec = array();
//$arrayCruisers = $_SESSION['cruisersList'];

#retrieve position data
$sqli_lpList = "SELECT vessel_MMSI, MAX(location_recno) AS location_recno,
SUBSTRING(MAX(CONCAT(LPAD(location_recno, 11, '0'), loc_latitude)), 12) AS loc_latitude,
SUBSTRING(MAX(CONCAT(LPAD(location_recno, 11, '0'), loc_longitude)), 12) AS loc_longitude,
SUBSTRING(MAX(CONCAT(LPAD(location_recno, 11, '0'), callsign)), 12) AS callsign,
SUBSTRING(MAX(CONCAT(LPAD(location_recno, 11, '0'), loc_timedate)), 12) AS loc_timedate,
SUBSTRING(MAX(CONCAT(LPAD(location_recno, 11, '0'), origin_port)), 12) AS origin_port,
SUBSTRING(MAX(CONCAT(LPAD(location_recno, 11, '0'), dest_port)), 12) AS dest_port,
SUBSTRING(MAX(CONCAT(LPAD(location_recno, 11, '0'), dest_Predicted_ETA)), 12) AS dest_Predicted_ETA,
SUBSTRING(MAX(CONCAT(LPAD(location_recno, 11, '0'), loc_speedOverGround)), 12) AS loc_speedOverGround,
SUBSTRING(MAX(CONCAT(LPAD(location_recno, 11, '0'), course_overGround)), 12) AS course_overGround,
SUBSTRING(MAX(CONCAT(LPAD(location_recno, 11, '0'), rate_of_turn_per_min)), 12) AS rate_of_turn_per_min,
SUBSTRING(MAX(CONCAT(LPAD(location_recno, 11, '0'), Navigation_status)), 12) AS Navigation_status,
SUBSTRING(MAX(CONCAT(LPAD(location_recno, 11, '0'), type_positioning_system)), 12) AS rate_of_turn_per_min,
SUBSTRING(MAX(CONCAT(LPAD(location_recno, 11, '0'), draught)), 12) AS draught
FROM Positioning GROUP BY vessel_MMSI;";

$resulti_lpList = $conn->query($sqli_lpList);

#store into array if data available
if ($resulti_lpList -> num_rows >0){
  while ($row = $resulti_lpList->fetch_assoc()){
    $arrayLastPositionrec[] = $row;
  }
}
else {
  echo "No vessel position data was found or error ocurred.";
}


//print_r($arrayLastPositionrec);
$_SESSION['lastPositionsList'] = $arrayLastPositionrec;

//header('Location:companycode_vesselMMSI.php');
?>
