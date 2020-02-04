<?php
$page_title ='Docpoint: Doctor Account';
include('includes/header.html');
require("includes/DBconnect.php");
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
	$query  = "SELECT a.appointmentDate, a.appointmentTime, p.LastName, p.FirstName, p.DOB 
	FROM Appointment AS a, patients AS p WHERE a.Patientid_FK=p.Pid AND a.appointmentDate > CURDATE() AND a.DoctorId_FK=".$_SESSION['Did'].";";
	$stmt = $dbc->prepare($query);
	$stmt->execute();
	$stmt->store_result();
	$stmt-> bind_result($aD, $aT, $PLN ,$PFN ,$PDOB);
	if ($stmt->fetch()){
		echo '<table><tr><th width="80">Date</th><th width="100">Time</th><th width="100">Patient Name</th><th width="80">Patient DOB</th></tr>';
		echo '<tr><td >'.$aD.'</td><td>'.$aT.'</td><td>'.$PLN.','.$PFN.'</td><td>'.$PDOB.'</td></tr>';
		echo '</table><br>';
	}
	else if (!$stmt->fetch()){
		echo 'No Upcoming Appointment Available.';
	}
	
?>

</body>
</html>

<?php
include('includes/footer.html');?>