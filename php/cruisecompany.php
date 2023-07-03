<!--****************************************************************************
// Filename: cruisecompany.php
// Author: Hugo Hiraoka  (c) Copyright
// Date: 2022 January
// Description: retrieves data : cruise company id and name
*****************************************************************************-->

<?php
session_start();

#define an array to hold cruise company data
$CruiseCompanyList = array();

#retrieve data from database
$sql_listCompanies = "SELECT * FROM Companies";
$result_listCompanies = $conn->query($sql_listCompanies);

#store into array if data is available
if ($result_listCompanies -> num_rows > 0) {
    while($row = $result_listCompanies -> fetch_assoc()) {
      $CruiseCompanyList[] = $row;
  }
    echo '<script>console.log("Cruise Company data loaded successfully"); </script>';
}
  else {
    echo '<script>console.log("Error. Could not load Cruise Company data."); </script>';
    echo "Cruiseline company not found or Error.";
  }

$_SESSION['cruiseCompanyList'] = $CruiseCompanyList;
?>
