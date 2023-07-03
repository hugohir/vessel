<!--*****************************************
Author: Hugo Hiraoka (c) 2022 January
Filename: teleport.php
Description: retrieves teleport information
             the database
********************************************* -->

<?php
session_start();

//define an array
$teleportList = array();

//get teleport data from database
$sqli_listTeleports = "SELECT * FROM Teleports";
$resulti_listTeleports = $conn->query($sqli_listTeleports);

//store into array if data is retrieved successfully
  if ($resulti_listTeleports -> num_rows > 0) {
      while($row = $resulti_listTeleports->fetch_assoc()){
        $teleportList[] = $row;
      }
      echo '<script>console.log("Teleport data loaded successfully.");</script>';
  }
  else
  {
    echo '<script>console.log("Error! Teleport data could not be loaded.");</script>';
    echo '<script>console.log("No teleports found.");</script>';
  }


$_SESSION['teleports']=$teleportList;
?>
