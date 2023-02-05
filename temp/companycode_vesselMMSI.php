<!--****************************************************************************
// Filename: companycode_vesselMMSI.php
// Author: Hugo Hiraoka (c) Copyright
// Date: Jan 2022
// Description: Produces array of company_code and vessel MMSI
//***************************************************************************-->
<?php
session_start();
//include_once "dbconfig.php";
//include "lastPositionList.php";

//$lastPos= $_SESSION['lastPositionsList'];

$arrayCompanyCode_Vessel_Location = array();


//do a search of companyVessel MMSI in the lastpositioning $

foreach()
$sqli_listVessels = "SELECT
Vessels.vessel_MMSI, Vessels.vessel_company, Vessels.vessel_callname,Vessels.vessel_IMO,
Vessels.vessel_flag,Vessels.vessel_name, Vessels.vessel_grossWeight,Vessels.vessel_length,Vessels.vessel_lengthBeam,Vessels.vessel_type,
Vessels.vessel_yearBuilt,Vessels.vessel_image1,
Companies.company_name,
Positioning.location_recno,Positioning.loc_timedate,Positioning.loc_latitude,
Positioning.loc_longitude, Positioning.dest_port, Positioning.dest_Predicted_ETA, Positioning.Navigation_status,Positioning.loc_speedOverGround,Positioning.draught,Positioning.course_overGround,
Positioning.rate_of_turn_per_min,Positioning.type_positioning_system
FROM Vessels
INNER JOIN Companies ON Vessels.vessel_company = Companies.company_id
INNER JOIN Positioning ON Positioning.vessel_MMSI = Vessels.vessel_MMSI;";
$resulti_listVessels = $conn->query($sqli_listVessels);

if ($resulti_listVessels -> num_rows > 0) {
    while($row = $resulti_listVessels -> fetch_assoc()){
      $arrayCompanyCode_Vessel_Location[]= $row;
    }
}
else
{
  echo "wrong";
}

print_r($arrayCompanyCode_Vessel_Location);
$_SESSION['list_CompanyCode_Vessel_Location'] = $arrayCompanyCode_Vessel_Location;
?>
