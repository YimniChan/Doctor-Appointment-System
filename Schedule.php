<?php
session_start();
$page_title ='Docpoint: Appointment Successful';
include('includes/header.html');

$scheduleID=$_GET['SID'];
$Did=$_GET['DID'];
$Pid=$_GET['PID'];

require("includes/DBconnect.php");

$query  = "SELECT * FROM AvailableSchedule WHERE ScheduleID=?";
$stmt = $dbc->prepare($query);
$stmt->bind_param('i', $scheduleID);
$stmt->execute();
$result = $stmt->get_result();
if($row = $result->fetch_assoc())
{
    $query = "INSERT INTO Appointment (appointmentDate, appointmentTime, DoctorId_FK, Patientid_FK) values(?,?,?,?);";

    $stmt2 = $dbc->prepare($query);
    $stmt2->bind_param('ssii', $row['ScheduleDate'], $row['ScheduleTime'], $Did, $Pid);
    $stmt2->execute();

    $query = "DELETE FROM AvailableSchedule WHERE ScheduleID=?";
    $stmt2 = $dbc->prepare($query);
    $stmt2->bind_param('i', $scheduleID);
    $stmt2->execute();
}

echo '<br/><br/><h1>Appointment Successful!</h1>
You are successful schedule an appointment.<br>
You can check your appointment at your account.<br>
Bach to account page in a second, ';
header("refresh:1 ;url=useraccount.php");	

include('includes/footer.html');

?>