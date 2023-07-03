<!--*****************************************
Author: Hugo Hiraoka (c) 2022 January
Filename: ports.php
Description: retrieves port information
             the database
********************************************* -->

<?php
session_start();

//define array to hold ports data
$arrayPortList = array();


//retrieve data from database
$sqli_listPorts = "SELECT * FROM Ports";
$resulti_listPorts = $conn->query($sqli_listPorts);

//store data into array if data is retrieved successfully
if ($resulti_listPorts -> num_rows >0) {
  while($row = $resulti_listPorts -> fetch_assoc()){
    $arrayPortList[] = $row;
  }
  echo '<script>console.log("Port data loaded successfully."); </script>';
}
else {
    echo '<script>console.log("Error! Port data could not load."); </script>';
    echo "No ports found or Error occurred.";
  }

//print_r($arrayPortList);
$_SESSION['arrayPorts'] = $arrayPortList;
?>
