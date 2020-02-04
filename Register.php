<?php 
// This script performs an INSERT query to add a record to the users table.
$page_title = 'User Register';
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
		$fn = mysqli_real_escape_string($dbc,trim($_POST['first_name']));
	}
	// Check for a last name:
	if (empty($_POST['last_name'])) {
		$errors[] = 'You forgot to enter your last name.';
	} else {
		$ln = mysqli_real_escape_string($dbc,trim($_POST['last_name']));
	}

	// Check for an email address:
	if (empty($_POST['email'])) {
		$errors[] = 'You forgot to enter your email address.';
	} else {
		$e = mysqli_real_escape_string($dbc,trim($_POST['email']));
		// Check the user is it in the database already
	// Make the query:
	$query = "SELECT Pid FROM patients WHERE email=?";//set to session
	$stmt = $dbc -> prepare($query);
 	$stmt->bind_param('s',$e,);
 	$stmt->execute();
 	$stmt->store_result();
	$stmt->bind_result($user_id);
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
	
	if (empty($_POST['date_Birth'])) {
		$errors[] = 'You forgot to enter your date of birth.';
	} else {
		$dob =mysqli_real_escape_string($dbc,trim($_POST['date_Birth']));}

	if (empty($_POST['address'])) {
		$errors[] = 'You forgot to enter your address.';
	} else {
		$address = mysqli_real_escape_string($dbc,trim($_POST['address']));
	}

	if (empty($_POST['insurance'])) {
		$ins = 'N/A';
	} else {
		$ins = mysqli_real_escape_string($dbc,trim($_POST['insurance']));
	}

	if (empty($_POST['phone'])) {
		$phoneN= 'N/A';
	} else {
		if(preg_match('/^\d{10}$/',$_POST['phone'])){
		$phoneN = $_POST['phone'];}
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
		header("refresh:2, url=login1.php");
	}
	else{
		if (empty($errors)) { 
			$q = "INSERT INTO patients (Lastname, Firstname, DOB, Address,insurance, PhoneNum, email, password) VALUES ('$ln', '$fn', '$dob', '$address','$ins','$phoneN','$e','$p');";
			$r = $dbc->query($q); // Run the query.
			$r -> execute();
			$r ->store_result();
				
			if($r -> affected_rows >0);{
	 			while ($stmt->fetch()) {
				$_SESSION['Pid'] = $PID;
				$_SESSION['name'] = $LN;}		
			//redirect
			header( "refresh:.05;url=useraccount.php" );
			}

			/*$result = $r->get_result();
			if ($r->affected_row()>0) {
		 	// Print a message:
				echo '<h1>Thank you!</h1>
				<p>You are now registered.</p><p><br>Automatically back to login page.<br></p>';
				header("refresh:.5;url=useraccount.php");
				//redirect_user('useraccount.php');}
			;*/

		}//end else-if 

		// Report the errors.
		else { 
		echo '<h1>Error!</h1>
		<p class="error">The following error(s) occurred:<br>';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br>\n";}
		echo '</p><p>Please try again.</p><p><br></p>';
		}//end else-else

	}//end else	 

	mysqli_close($dbc); // Close the database connection.
	unset($mysqli);
} // End of the main Submit conditional.
?>
<?php echo '<br><br>';?>
<h1>Register</h1>
<form action="Register.php" method="post">
	<p>Email Address: <input type="email" name="email" size="20" maxlength="60" > </p>	
	<p>First Name: <input type="text" name="first_name" size="15" maxlength="20"></p>
	<p>Last Name: <input type="text" name="last_name" size="15" maxlength="40"></p>
	<p>Password: <input type="password" name="pass1" size="10" maxlength="20"></p>
	<p>Confirm Password: <input type="password" name="pass2" size="10" maxlength="20" ></p>
	<p>Date of Birth: <input type="date" name="date_Birth"  ></p>
	<p>Address: <input type="text" name="address" size="15" maxlength="100" ></p>
	<p>Insurance: <input type="text" name="insurance" size="15" maxlength="100"  ></p>
	<p>Phone Number: <input type="tel" name="phone" size="15" <span> Format: 9171234567 </span></p>
	<p><input type="submit" name="submit" value="Register"></p>
</form>

<?php 
 echo '<br><br>';
include('includes/footer.html'); ?>