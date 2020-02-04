<?php 
// This script performs an INSERT query to add a record to the users table.
$page_title = 'Doctor Register';
session_start();
include('includes/header.html');

// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	require("includes/DBconnect.php"); // Connect to the db.
	$errors = []; // Initialize an error array.
	// Check for a first name:
	if (empty($_POST['first_name'])) {
		$errors[] = 'You forgot to enter your first name.';
	} else {
		$fn = $mysqli->real_escape_string(trim($_POST['first_name']));
	}

	// Check for a last name:
	if (empty($_POST['last_name'])) {
		$errors[] = 'You forgot to enter your last name.';
	} else {
		$ln = $mysqli->real_escape_string(trim($_POST['last_name']));
	}

	// Check for an email address:
	if (empty($_POST['email'])) {
		$errors[] = 'You forgot to enter your email address.';
	} else {
		$e = $mysqli->real_escape_string(trim($_POST['email']));
	}

	// Check for a password and match against the confirmed password:
	if (!empty($_POST['pass1'])) {
		if ($_POST['pass1'] != $_POST['pass2']) {
			$errors[] = 'Your password did not match the confirmed password.';
		} else {
			$p = password_hash(trim($_POST['pass1']), PASSWORD_DEFAULT);
		}
	} else {
		$errors[] = 'You forgot to enter your password.';
	}

	if (empty($_POST['specialties'])) {
		$errors[] = 'You forgot to enter your specialties.';
	} else {
		$sp = $mysqli->real_escape_string(trim($_POST['specialties']));
	}

	if (empty($_POST['procedure'])) {
		$pn = 'N/A';
	} else {
		$pn = $mysqli->real_escape_string(trim($_POST['procedure']));
	}

	if (empty($_POST['phone'])) {
		$phoneN= 'N/A';
	} else {
		if(preg_match('/^\d{10}$/',$_POST['phone'])){
		$phoneN = $_POST['phone'];}
	}

	if (empty($_POST['address'])) {
		$errors[] = 'You forgot to enter your address.';
	} else {
		$address = $mysqli->real_escape_string(trim($_POST['address']));
	}

	if (empty($_POST['zipcode'])) {
		$errors[] = 'You forgot to enter your zipcode.';
	} else {
		$zip = $mysqli->real_escape_string(trim($_POST['zipcode']));
	}

	if (empty($_POST['image'])) {
		$im = 'N/A';
	} else {
		$im = $_FILES['image']['icon'];
	}
	
	// Make the query:Check the user is it in the database already
	$query = "SELECT Pid FROM patients WHERE email=?";//set to session
	$stmt = $dbc -> prepare($query);
 	$stmt->bind_param('s',$e,);
 	$stmt->execute();
 	$stmt->store_result();
	$stmt->bind_result($pid); 

	if ($stmt->num_rows == 1){
		echo '<br/><br/>Email address already used. Please login in.<br/>Automatically back to login page.';
		header("refresh:2, url=loginD.php");
	}

	else{
	if (empty($errors)) { // If everything's OK.
		//Make the query: Register the user in the database...

		$imgicon = addslashes($_FILES['image']['icon']);
		$image = base64_encode(file_get_contents($_FILES['image']['icon']));
		
		$q = "INSERT INTO Doctors (Lastname, Firstname, email, password,Specialties,ProcedureName, ImagePath,Phone, Address, zipCode) VALUES ('$ln', '$fn','$e','$p', '$sp','$pn', '$image', '$tel', '$address','$zip')";
		$r = $dbc->query($q); // Run the query.
		if ($mysqli->affected_rows == 1) { // If it ran OK.
			// Print a message:
			echo '<h1>Thank you!</h1>
			//re
		<p>You are now registered.</p><p><br></p>';
		} else { // If it did not run OK.
			// Public message:
			echo '<h1>System Error</h1>
			<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>';
			// Debugging message:
			echo '<p>' . $mysqli->error . '<br><br>Query: ' . $q . '</p>';
		} // End of if ($r) IF.
		$mysqli->close(); // Close the database connection.
		unset($mysqli);
		// Include the footer and quit the script:
		include('includes/footer.html');
		exit();
	} else { // Report the errors.
		echo '<h1>Error!</h1>
		<p class="error">The following error(s) occurred:<br>';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br>\n";
		}
		echo '</p><p>Please try again.</p><p><br></p>';
	} // End of else (if (empty($errors)) else)
	}
		$mysqli->close(); // Close the database connection.
		unset($mysqli);
} // End of the main Submit conditional.
?>
<html>
<body>
<?php echo '<br>'; ?>
<h1>Doctor Register</h1>

<form action="RegisterDoctor.php" method="post">
<!--	<table><tr><td >  </td><td>  </td></tr>-->
	<p>First Name:  <input type="text" name="first_name" size="15" maxlength="20" ></p>
	<p>Last Name:   <input type="text" name="last_name" size="15" maxlength="40"></p>
	<p>Email: <input type="email" name="email" size="20" maxlength="60" > </p>
	<p>Password: <input type="password" name="pass1" size="10" maxlength="20" ></p>
	<p>Confirm Password: <input type="password" name="pass2" size="10" maxlength="20"></p>
	<p>Specialties: <input type="text" name="specialties" size="15" maxlength="100" ></p>
	<p>Procedure: <input type="text" name="procedure" size="15" maxlength="100" ></p>
	<p>Phone Number: <input type="tel" name="phone" size="15" ><span>Format: 9171234567</span></p>
	<p>Address: <input type="text" name="address" size="15" maxlength="100" ></p>
	<p>Zip Code: <input type="text" name="zipcode" size="15" maxlength="5" ></p>
	
	<p>Select a icon image:<input type="file" name="image"><br><br></p>
	<p><input type="submit" name="submit" value="Register"><br><br></p>
	</table>
</form>

</body>
</html>
<?php echo'<br><br><br><br>';
include('includes/footer.html'); ?>