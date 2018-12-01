<?php

require_once('mysqli_connect.php');

$select = "SELECT UserType FROM Users WHERE UserID='" . $_POST['id'] . "'";

$sresponse = $conn->query($select);

if (mysqli_num_rows($sresponse) > 0){

	$rows = mysqli_fetch_assoc($sresponse);
	
	 if ( $rows['UserType'] == "Cust" ) {
	 	//mysqli_close($conn);
	 	header('Location: https://www.wirk.app/home.php');
	 }
	 elseif ( $rows['UserType'] == "Employee" ) {
	 	//$conn->close();
	 	header('Location: https://www.wirk.app/employee_dashboard.php');
	 }
} else {

	$insert = "INSERT INTO Users(UserID, FirstName, LastName, Email) VALUES ('" . $_POST["id"] . "', '" . $_POST["fname"] . "', '" . $_POST["lname"] . "', '" . $_POST["email"] . "')";

	if ($conn->query($insert) === TRUE){
		echo "Added successfully.";
	} else {
		echo "Error: " . $insert . "<br>" . $conn->error;
	}

header('Location: https://www.wirk.app/home.php');

}

$conn->close();

?>
