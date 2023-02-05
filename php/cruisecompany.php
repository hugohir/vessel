<!--****************************************************************************
// Filename: cruisecompany.php
// Author: Hugo Hiraoka  (c) Copyright
// Date: 2022 January
// Description: retrieves data : cruise company id and name
*****************************************************************************-->

<?php
session_start();

$CruiseCompanyList = array();

$sql_listCompanies = "SELECT * FROM Companies";
$result_listCompanies = $conn->query($sql_listCompanies);

if ($result_listCompanies -> num_rows > 0) {
    while($row = $result_listCompanies -> fetch_assoc()) {
      $CruiseCompanyList[] = $row;
  }}
  else {
    echo "Cruiseline company not found";
  }

$_SESSION['cruiseCompanyList'] = $CruiseCompanyList;
?>
