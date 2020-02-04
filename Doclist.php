<?php
session_start();
$page_title ='Docpoint: Search result';
include('includes/header.html');
require("includes/DBconnect.php");
?>
<style>
	.firstLabel {
    margin-right: 50px;
}
</style>
<?php

if(isset($_GET['searchtype']))
	$searchtype = $_GET['searchtype'];//built to query of these two
if(isset($_GET['searchterm']))
	$searchterm = $_GET['searchterm'];
if(isset($_GET['location']))
	$searchLocation = $_GET['location'];
if(isset($_GET['date']))
	$searchdate = $_GET['date'];

//check $searchtype 
//whilelisting
switch($searchtype)
{
	case 'Specialties':
	case 'Procedure':
	case 'DoctorName':
	break;
	default;
}
if ( !isset($_SESSION['Pid'])&& !isset($_SESSION['Did'])){
	echo '<br><br><h4>Login before Search!!</h4><br>
	<h5><a href="login1.php">Patient Login</a></h5><br>
	<h5><a href="loginD.php">Doctor Login</a></h5>';
}
else{
echo '<br><br><br>';
include('searchForm.php');
if($searchtype=='Specialties')
{
$query  = "SELECT * FROM AvailableSchedule JOIN Doctors where AvailableSchedule.DoctorId_FK = Doctors.Did AND AvailableSchedule.ScheduleDate>CURDATE() AND Doctors.Specialties = ?";
$array_of_values = array( $searchterm );
$types = 's';
if(isset($searchLocation) && !empty($searchLocation))
{
	$query = $query . " AND Doctors.zipCode = ?";
	array_push($array_of_values,$searchLocation);
	$types = $types . 's';
}
if(isset($searchdate) && !empty($searchdate))
{
	$query = $query . " AND AvailableSchedule.ScheduleDate = ?";
	array_push($array_of_values,$searchdate);
	$types = $types . 's';
}
//order by date
$stmt = $dbc->prepare($query);

//error here 
$stmt->bind_param( $types, ...$array_of_values);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc())
{
	echo '<label>Available Appointments for '.$searchterm.':</label><br>';
	//echo '<table ><tr><th width="200">Doctor Name</th><th width="200">Appointment Time and date</th><th></th></tr>';
	echo '<div><span class="firstLabel">Doctor Name</span>			<span class="secondLabel">Appointment Time and date</span></div>';
	do {
		if (isset($_SESSION['Pid'])){
			
			echo '
			<br><br><div><span class="firstLabel">'.$row['FirstName'] . ' ' .$row['LastName'].'</span> 
			<span class="secondLabel">'.$row['ScheduleTime']." ".$row['ScheduleDate'].'</span>
			<a href="Schedule.php?SID='.$row['Scheduleid'].'&DID='.$row['DoctorId_FK'].'&PID='.$_SESSION['Pid'].'">Schedule Appointment</a></div>';
		}else {
			echo '<br><br><div><span class="firstLabel">'.$row['FirstName'] . ' ' .$row['LastName'].'</span> 
			<span class="secondLabel">'.$row['ScheduleTime']." ".$row['ScheduleDate'].'</span></div>';
		}
	//echo '</table>';
	} while ($row = $result->fetch_assoc());
}
else{
	echo 'No Appointments Available for '.$searchterm;}
}
else if($searchtype=='DoctorName'){
	$query  = "SELECT * FROM Doctors JOIN AvailableSchedule where AvailableSchedule.DoctorId_FK = Doctors.Did AND CONCAT(Doctors.FirstName,' ',Doctors.LastName) = ?";

	$stmt = $dbc->prepare($query);
	$stmt->bind_param('s', $searchterm);
	$stmt->execute();
	$result = $stmt->get_result();
	
	if ($row = $result->fetch_assoc())
	{
		echo '<label>Available Appointments for '.$searchterm.':</label><br>';
		echo '<div><span class="firstLabel">Doctor Name</span>			<span class="secondLabel">Appointment Time and date</span></div>';
		do {
			if (isset($_SESSION['Pid'])){
				echo '<br><br><div><span class="firstLabel">'.$row['FirstName'] . ' ' .$row['LastName'].'</span>
			 	<span class="secondLabel">'.$row['ScheduleTime']." ".$row['ScheduleDate'].'</span>
			 	<a href="Schedule.php?SID='.$row['Scheduleid'].'&DID='.$row['DoctorId_FK'].'&PID='.$_SESSION['Pid'].'">Schedule Appointment</a></div>';
			}else {
				echo '<br><br><div><span class="firstLabel">'.$row['FirstName'] . ' ' .$row['LastName'].'</span>
			 	<span class="secondLabel">'.$row['ScheduleTime']." ".$row['ScheduleDate'].'</span></div>';
			}
		} while ($row = $result->fetch_assoc());
	}
	else{
		echo 'No Appointments Available for '.$searchterm;
	}
}

}//end else if
/*
keep add for the producre, if only zip code, or date, or insurance
*/

$dbc->close();

include('includes/footer.html');
?>
