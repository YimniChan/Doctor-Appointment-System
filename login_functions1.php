<?php 
function redirect_user($page = 'index.php') {
	$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
	$url = rtrim($url, '/\\');
	$url .= '/' . $page;
	header("Location: $url");
	exit(); // Quit the script.
} // End of redirect_user() function.

function check_login($dbc, $email = '', $pass = '') {
	$errors = array(); // Initialize error array.

	// Validate the email address:
	if (empty($email)) {
		$errors[] = 'You forgot to enter your email address.';
	} else {
		$e = mysqli_real_escape_string($dbc, trim($email));
	}
	// Validate the password:
	if (empty($pass)) {
		$errors[] = 'You forgot to enter your password.';
	} else {
		$p = mysqli_real_escape_string($dbc, trim($pass));
	}
	
	if (empty($errors)) { // If everything's OK.
	// Retrieve the user_id and first_name for that email/password combination:
	 $query = "SELECT Pid, LastName FROM patients WHERE email='".$e."' AND password='".$p."';";//set to session
	 $stmt = $dbc -> prepare($query);
 	 $stmt->execute();
	 $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            return array(true, array($row['Pid'], $row['name']));
        }
        else 
        { // Not a match!
            $errors[] = 'The email address and password entered do not match those on file.';
        }
        //return false and error
	return array(false,$errors);
	} // End of check_login() function.
}

function check_loginD($dbc, $email = '', $pass = '') {
	$errors = array(); // Initialize error array.

	// Validate the email address:
	if (empty($email)) {
		$errors[] = 'You forgot to enter your email address.';
	} else {
		$e = mysqli_real_escape_string($dbc, trim($email));
	}
	// Validate the password:
	if (empty($pass)) {
		$errors[] = 'You forgot to enter your password.';
	} else {
		$p = mysqli_real_escape_string($dbc, trim($pass));
	}
	
	if (empty($errors)) { // If everything's OK.
	// Retrieve the user_id and first_name for that email/password combination:
	 $query = "SELECT Did, LastName FROM Doctors  WHERE email='".$e."' AND password='".$p."';";//set to session
	 $stmt = $dbc -> prepare($query);
 	 $stmt->execute();
	 $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            return array(true, array($row['Did'], $row['name']));
        }
        else 
        { // Not a match!
            $errors[] = 'The email address and password entered do not match those on file.';
        }
        //return false and error
	return array(false,$errors);
	} // End of check_login() function.
}

