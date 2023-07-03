<!-- ************************************************************************
// Filename: setup.PHP
// Author: Hugo Hiraoka
// Date: May 2023
// Description:
****************************************************************************-->

<?php
session_start();

#from cruisecompany.php
#$companies = $_SESSION['cruiseCompanyList'];
echo("setup.php");
print_($companies);
#// Check if the array is not empty
/*
if (!empty($companies)) {
    echo '<table>';
    echo '<thead>';
    echo '<tr><th>ID</th><th>Company</th><th>Location</th></tr>';
    echo '</thead>';
    echo '<tbody>';

/*
 [company_id] => 1101
 [company_name] => CARNIVAL
 [company_hq] =>
 [clat_temp] =>
 [clong_temp] =>
 [companyVes_icon] => ../../images/markers/vessels/0.25x/icon_ship_32-redbluewhite@0.25x.png )
*/


    // Iterate over each company and display its data in a row
/*    foreach ($companies as $company) {
        echo '<tr>';
        echo '<td>'.$company['company_id'].'</td>';
        echo '<td>'.$company['company_name'].'</td>';
        echo '<td>'.$company['company_hq'].'</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
} else {
    echo 'No companies found.';
}


}








 ?>
