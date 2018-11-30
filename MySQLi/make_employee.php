<?php

require_once('mysqli_connect.php');

$sql = "UPDATE Users SET UserType='Employee' WHERE UserID='" . $_POST['id'] . "'";

if ($conn->query($sql) === TRUE) {
	if(mysqli_affected_rows($conn) > 0){
		echo "You are now an Employee!";
    	header('Refresh: 5; URL=https://www.wirk.app/employe_dashboard.php');
	} else {
	    echo "You are already an employee!";
	    header('Refresh: 5; URL=https://www.wirk.app/home.php');
    }
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

?>
