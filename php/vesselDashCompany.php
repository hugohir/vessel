<!--****************************************************************************
// Filename: vesselDashCompany.php
// Author: Hugo Hiraoka (c) Copyright
// Date: Jan 2022
// Description: Produces array vessel name and vessel company name for autocomplete
//***************************************************************************-->

<?php

//Define array to hold vessel and company name data
$arrayVesselNameDashCompany = array("","");

#retrieve data vessel and company from database
$sqli_listVessels = "SELECT Vessels.vessel_name,Vessels.vessel_company,Companies.company_id,Companies.company_name FROM Vessels INNER JOIN Companies ON Vessels.vessel_company = Companies.company_id";
$resulti_listVessels = $conn->query($sqli_listVessels);

#store retrieved data from database if available
if ($resulti_listVessels -> num_rows > 0) {
    while($row = $resulti_listVessels->fetch_array()){
      $arrayVesselNameDashCompany[]= $row["vessel_name"]."-".$row["company_name"];
    }
    echo '<script>console.log("Vessel-Company data loaded successfully"); </script>';
}
else
{
  echo '<script>console.log("Error! Vessel-Company list could not be loaded."); </script>';
  echo "No vessel-company data available or error occurred.";
}

//print_r($arrayVessels);
$_SESSION['listVesselDashCompany'] = $arrayVesselNameDashCompany;
?>
