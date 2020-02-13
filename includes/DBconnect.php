<?php
define('DB_USER', '____');//your username
define('DB_PASSWORD', '_____');//your password
define('DB_HOST', '_____');//your database location
define('DB_NAME', '_____');//your database name

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) 
	OR die('Could not connect to MySQL: ' . mysqli_connect_error() );

?>
