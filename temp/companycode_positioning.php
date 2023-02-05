<!--****************************************************************************
// Filename: companycode_positioning.php
// Author: Hugo Hiraoka (c) Copyright
// Date: Jan 2022
// Description: Produces array of company_code and positioning information
//***************************************************************************-->

<?php

$arrayLastPositions= $_SESSION['lastPositionsList'];
$arrayCompanyCodeVesselMMSI = $_SESSION['list_Companycode_VesselMNSI']

$arrayCompVesPos = array();



$sqli_listCompVesPos = "SELECT Vessels.vessel_MMSI, Vessels.vessel_company, Companies.company_id,Companies.company_name FROM Vessels INNER JOIN Companies ON Vessels.vessel_company = Companies.company_id";
$resulti_listCompVesPos = $conn->query($sqli_listCompVesPos);

if ($resulti_listCompVesPos -> num_rows > 0) {
    while($row = $resulti_listCompVesPos -> fetch_assoc()){
      $arrayCompVesPos[]= $row;
    }
}
else
{
  echo "wrong";
}

//rint_r($arrayCompanyCode_MMSI);
$_SESSION['list_Companycode_VesselMNSI'] = $arrayCompanyCode_MMSI;
?>
