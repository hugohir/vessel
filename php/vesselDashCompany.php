<!--****************************************************************************
// Filename: vesselDashCompany.php
// Author: Hugo Hiraoka (c) Copyright
// Date: Jan 2022
// Description: Produces array vessel name and vessel company name for autocomplete
//***************************************************************************-->

<?php
//include_once "dbconfig.php";

$arrayVesselNameDashCompany = array("","");

$sqli_listVessels = "SELECT Vessels.vessel_name,Vessels.vessel_company,Companies.company_id,Companies.company_name FROM Vessels INNER JOIN Companies ON Vessels.vessel_company = Companies.company_id";
$resulti_listVessels = $conn->query($sqli_listVessels);

if ($resulti_listVessels -> num_rows > 0) {
    while($row = $resulti_listVessels->fetch_array()){
      $arrayVesselNameDashCompany[]= $row["vessel_name"]."-".$row["company_name"];
    }
}
else
{
  echo "wrong";
}

//print_r($arrayVessels);
$_SESSION['listVesselDashCompany'] = $arrayVesselNameDashCompany;
?>
