<?php
session_start();// Set the session data:
$page_title = 'Doctor Login';
include('includes/header.html');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	require('login_functions1.php');
	require('includes/DBconnect.php');
	
	list($check,$data) = check_loginD($dbc, ($_POST['email']),($_POST['pass']));
	if ($check){
		$_SESSION['Did'] = $data[0];
		$_SESSION['name'] = $data[1];
		// Redirect:
		redirect_user('useraccountDoctor.php');
	} else { // Unsuccessful
		$errors = $data;
	}
	mysqli_close($dbc); // Close the database connection.
} // End of the main submit conditional
echo '<br>';
echo '<h1>Doctor Login</h1>';
include('loginFormD.php');

?>

