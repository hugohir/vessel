<!--****************************************************************************
// Filename: cruiser.php
// Author: Hugo Hiraoka  (c) Copyright
// Date: 2022 January
// Description: matches search of cruiseliners and also matches companyid-name
*****************************************************************************-->
<!DOCTYPE html>
<?php
session_start();
//include_once "dbconfig.php";
$vessel_company = $_GET["ship"];

[$cruisename,$cruisecompany] = explode("-",$vessel_company);
$_SESSION['vname'] = $cruisename;
$_SESSION['vcompany'] = $cruisecompany;

$CruiselineList = array();

//retrieve company ID number from companies
$sqli_CompanyID = "SELECT company_id, company_name FROM Companies WHERE company_name = '$cruisecompany'";
$result_CompanyID = $conn -> query($sqli_CompanyID);

if ($result_CompanyID -> num_rows > 0) {
    while($row = $result_CompanyID -> fetch_assoc()) {
      $companyID =  $row["company_id"];
  }}
  else {
    //echo "Cruiseline company not found";
  }

//match cruisename and companyid, retrieve MMSI from vessels
$sqli_MMSI = "SELECT *
              FROM Vessels WHERE vessel_name = '$cruisename' AND vessel_company= '$companyID'";

$result_MMSI = $conn -> query($sqli_MMSI);

if ($result_MMSI -> num_rows > 0) {
  while($row = $result_MMSI -> fetch_assoc()){

    $_SESSION['MMSI'] = $row["vessel_MMSI"];
    $_SESSION['IMO'] = $row["vessel_IMO"];
    $_SESSION['CALLNAME'] = $row["vessel_callname"];
    $_SESSION['FLAG'] = $row["vessel_MID_flag"];
    $_SESSION['YEARBUILT'] = $row["vessel_yearBuilt"];
    $_SESSION['VESSEL_LENGTH'] = $row["vessel_length"];
    $_SESSION['VESSEL_BEAM'] = $row["vessel_lengthBeam"];
    $_SESSION['VESSEL_IMAGE'] = $row["vessel_image1"];
    $_SESSION['VESSEL_GWT'] = $row["vessel_grossWeight"];

  }}
else {
    //echo "cruiseline MMSI not found";
  }

//  $conn->close();
header('Location:index.php');
?>
