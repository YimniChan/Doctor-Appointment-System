<?php
define('DB_USER', 'chan');
define('DB_PASSWORD', 'yimni23503159');
define('DB_HOST', 'localhost');
define('DB_NAME', 'chan_DAS');

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) 
	OR die('Could not connect to MySQL: ' . mysqli_connect_error() );

?>