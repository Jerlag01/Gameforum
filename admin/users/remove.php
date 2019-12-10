<?php
	include ('../required/connection.php');
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$userid = $conn->real_escape_string($_POST['deleteuser']);
		$deleteuser = "DELETE FROM users where id = $userid";
	
		if ($conn->query($deleteuser) === true) {
			$_SESSION['message'] = "User has been removed.";
			header("location: ./index.php");
		}
		else {
			$_SESSION['message'] = "User couldn't be removed";
		}
	}
?>