<?php

require_once('mysqli_connect.php');

$timestamp = date("Y-m-d H:i:s");

$sql = "INSERT INTO Hours (UserID, Punch) VALUES ('" . $_POST['id'] . "', '" . $timestamp . "')";

if ($conn->query($sql) === TRUE) {
	echo "Successfully added punch at: " . $timestamp; 
} else {
    echo "Error updating record: " . mysqli_error($conn);
}


?>
