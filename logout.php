<?php
session_start();
$page_title = 'Logged Out';
include('includes/header.html');


$_SESSION=[];
session_destroy(); // Destroy the session itself.
setcookie('PHPSESSID', '', time()-3600, '/', '', 0, 0); // Destroy the cookie.
echo '<br/><br/><h1>Logged Out!</h1>
You are successful logged out!<br>
Bach to Home page in a second. ';
header("refresh:.5;url=index.php");

include('includes/footer.html');
?>
