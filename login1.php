<?php
session_start();// Set the session data:
$page_title = 'User Login';
include('includes/header.html');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	require('login_functions1.php');
	require('includes/DBconnect.php');

	list($check,$data) = check_login($dbc, ($_POST['email']),($_POST['pass']));
	if ($check){
		$_SESSION['Pid'] = $data[0];
		$_SESSION['name'] = $data[1];
		// Redirect:
		redirect_user('useraccount.php');
	} else { // Unsuccessful
		$errors = $data;
		//echo '<br><br>'.$errors[0];
	}
	mysqli_close($dbc); // Close the database connection.
} // End of the main submit conditional.
echo '<br>';
echo '<h1>Login</h1>';
include('loginForm.php');

?>

