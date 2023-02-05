<!--*****************************************
Author: Hugo Hiraoka (c) 2022 January
Filename: ports.php
Description: retrieves port information
             the database
********************************************* -->

<?php
session_start();
//include_once "dbconfig.php";

$arrayPortList = array();

$sqli_listPorts = "SELECT * FROM Ports";
$resulti_listPorts = $conn->query($sqli_listPorts);

if ($resulti_listPorts -> num_rows >0) {
  while($row = $resulti_listPorts -> fetch_assoc()){
    $arrayPortList[] = $row;
  }
}
else {
    echo "0 results";
  }

//print_r($arrayPortList);

$_SESSION['arrayPorts'] = $arrayPortList;
?>
