<!--****************************************************************************
Author: Hugo Hiraoka (c) Copyright
Date: 2022 January
Filename: dbconfig.php
Description: configures database connection
*****************************************************************************-->
<?php

$servername = "localhost";

//$username = "tester";
//$password = "#Fl33147";
//$dbname = "Vessel_Positioning";

$username = "user";
$password = "test";
$dbname = "cruisetracker";

//create connection to database 1
$conn = new mysqli($servername,$username,$password,$dbname);

//database 1 check connection
if ($conn->connect_error)
  {
    echo '<script>console.log("Critical Error. Connection Failed."); </script>';
    die("Connection failed: ".$conn->connect_error);
  }
else
  {
       echo '<script>console.log("Connected successfully."); </script>';
  }


//include "Location: teleport.php";
?>
