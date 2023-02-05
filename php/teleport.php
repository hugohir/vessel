<!--*****************************************
Author: Hugo Hiraoka (c) 2022 January
Filename: teleport.php
Description: retrieves teleport information
             the database
********************************************* -->

<?php
session_start();

//get teleport data
$teleportList = array();

$sqli_listTeleports = "SELECT * FROM Teleports";
$resulti_listTeleports = $conn->query($sqli_listTeleports);

  if ($resulti_listTeleports -> num_rows > 0) {
      while($row = $resulti_listTeleports->fetch_assoc()){
        $teleportList[] = $row;
      }
  }
  else
  {
    echo "0 results";
  }


$_SESSION['teleports']=$teleportList;
?>
