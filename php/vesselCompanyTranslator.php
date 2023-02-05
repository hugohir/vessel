<!--****************************************************************************
// Filename: vesselCompanyTranslator.php
// Author: Hugo Hiraoka (c) Copyright
// Date: Jan 2022
// Description: Produces array vessel name,  and vessel company name for autocomplete search
//***************************************************************************-->

<?php

$arrayVessel = array("","");

$sqli_listVessels = "SELECT Vessels.vessel_name,Vessels.MMSI, Vessels.vessel_company,Companies.company_id,Companies.company_name FROM Vessels INNER JOIN Companies ON Vessels.vessel_company = Companies.company_id";
$resulti_listVessels = $conn->query($sqli_listVessels);

if ($resulti_listVessels -> num_rows > 0) {
    while($row = $resulti_listVessels->fetch_array()){
      $arrayVessels[]= $row["vessel_name"]."-".$row["company_name"];
    }
}
else
{
  echo "wrong";
}

$_SESSION['listVessels'] = $arrayVessels;
?>
