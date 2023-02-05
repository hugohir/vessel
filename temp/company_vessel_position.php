<!--****************************************************************************
// Filename: companycode_vessel_position.php
// Author: Hugo Hiraoka (c) Copyright
// Date: Jan 2022
// Description: Produces array of company_code, vessel info and Position info
//***************************************************************************-->
<?php
session_start();
//include_once "dbconfig.php";
//include "vessels_companies.php";
include "cruisecompany.php";
$companiesVessels = $_SESSION['cruiseCompanyList'];
//$companiesVessels = $_SESSION['listVessels'];
//print_r($companiesVessels);


/*
$arrayCompanyCode_Vessel_Positiob = array();

$sqli_listCompanyVesselPos = "SELECT
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
$resulti_listCompanyVesselPos = $conn->query($sqli_listCompanyVesselPos);

if ($resulti_listCompanyVesselPos -> num_rows > 0) {
    while($row = $resulti_listCompanyVesselPos -> fetch_assoc()){
      $arrayCompanyCode_Vessel_Position= $row;
    }
}
else
{
  echo "wrong";
}

print_r($arrayCompanyCode_Vessel_Position);
$_SESSION['list_CompanyCode_Vessel_Position'] = $arrayCompanyCode_Vessel_Position;
*/
?>
