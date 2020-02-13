<?php
//logon to the server
//incclude a file that has the login information
//or logonfunction
//mysqli_connect.php in https://github.com/LarryUllman/phpmysqlvqp-5ed ch9


echo "<h1>Book Results</h1>";
//include('../../loginInfo/login.php');
//define the constant database connection
define('DB_USER', '____');//your username
define('DB_PASSWORD', '_____');//your password
define('DB_HOST', '_____');//your database location
define('DB_NAME', '_____');//your database name

// Make the connection:
$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) 
	OR die('Could not connect to MySQL: ' . mysqli_connect_error() );

$searchtype = $_POST['searchtype'];//built to query of these two
$searchterm = $_POST['searchterm'];

//check if they are empty
if(!$searchtype ||!$searchterm){ 
	echo "No proper input!";
	exit;
}
//check $searchtype 
//whilelisting
switch($searchtype)
{
	case 'Title':
	case 'Author':
	case 'ISBN':
	break;
	defauit;
}

//continue error checking post input next week

// ? mean placeholder for prepared query!
$query  = "SELECT ISBN, Author, Title, Price
			FROM Books WHERE $searchtype = ? ";
$stmt = $dbc->prepare($query);
$stmt->bind_param('s', $searchterm);
$stmt->execute();
$stmt->store_result();

$stmt-> bind_result($ISBN, $Author, $Title, $Price);
echo "<p>Bumber of Books;".$stmt->num_rows. "</p>";

while ($stmt->fetch()){
	echo $ISBN."<br/>".$Author."<br/><b>".$Title."</b><br/>".number_format($Price,2)."<br/><br/>";
}
// Set the encoding...			
//mysqli_set_charset($dbc, 'utf8');
?>
