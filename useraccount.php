<?php
$page_title ='Docpoint: User Account';
include('includes/header.html');
require("includes/DBconnect.php");

/*
function email(){
<form action="change.php" method = "post">
	<table>
		<tr><td> Old Email:</td><td> <input type = "text" name = "oEmail"/></td></tr>
		<tr><td> New Email:</td><td> <input type = "text" name = "nEmail"/></td></tr>
	</table>	
	<input type = "submit" name = "submit" value = "Submit"/>
}

function password(){
<form action="change.php" method = "post">
	<table>
		<tr><td> Old Password:</td><td> <input type = "Password" name = "oPassword"/></td></tr>
		<tr><td> New Password:</td><td> <input type = "Password" name = "nPassword"/></td></tr>
	</table>
	<input type = "submit" name = "submit" value = "Submit"/>
}*/
?>

<html>
<body>
<?php
echo '<br><br><br>';
include('searchForm.php');
?>

<div><h4><b>Upcoming Appointment </b></h4></div>
<br/>
<?php
	$query  = "SELECT a.appointmentDate, a.appointmentTime, d.LastName 
	FROM Appointment AS a, Doctors AS d WHERE a.DoctorId_FK=d.Did AND a.appointmentDate > CURDATE() AND a.Patientid_FK=".$_SESSION['Pid'].";";
	$stmt = $dbc->prepare($query);
	$stmt->execute();
	$stmt->store_result();
	$stmt-> bind_result($aD, $aT, $aDoctor);
	if ($stmt->fetch()){
		echo '<table ><tr><th width="100">Date</th><th width="100">Time</th><th width="180">Doctor Name</th></tr>';
		echo'<tr><td>'.$aD.'</td><td>'.$aT.'</td><td>Dr.'.$aDoctor.'</td></tr>';
		echo '</table>';
	}else{
		echo 'No Upcoming Appointment Available.';
	}


echo '<br><br>';
?>
<div><h4><b>History</b></h4></div>
<br/>
<?php
	$query  = "SELECT a.appointmentDate, a.appointmentTime, t.Title, d.LastName 
	FROM Record AS t , Doctors AS d, Appointment AS a 
	WHERE t.visitID=a.appointmentid 
	AND a.DoctorId_FK=d.Did
	AND a.appointmentDate < CURDATE()
	AND a.patientId_FK=".$_SESSION['Pid'].";";
	$stmt = $dbc->prepare($query);
	$stmt->execute();
	$stmt->store_result();
	$stmt-> bind_result($RD, $RT, $RR, $DLN);
	if ($stmt->fetch()){
		echo '<table ><tr><th width="100">Date</th><th width="100">Time</th><th width="100">Title</th><th width="180">Doctor Name</th></tr>';
		echo'<tr><td>'.$RD.'</td><td>'.$RT.'</td><td>'.$RR.'</td><td>Dr. '.$DLN.'</td></tr>';
		echo '</table>';
	}else{
		echo 'No History Available.';
	}
?>

</body>
</html>

<?php
include('includes/footer.html');
?>
