<?php
$page_title ='Docpoint: Help & FAQ';
include('includes/header.html');
require("includes/DBconnect.php");
?>

<html>
<body>
<div class="page-header"><h1><br/><br/> Help and FAQ</h1></div>
<br>

<h4><b>Popular Questions:</b></h4>
<br/>
<?php
$query  = "SELECT Title, Qbody FROM questions ORDER BY Qid";
$stmt = $dbc->prepare($query);
$stmt->execute();
$stmt->store_result();
$stmt-> bind_result($Title, $Qbody);
?>


<?php
while ($stmt->fetch()){
echo '<b>'.$Title.'</b><br>'.$Qbody.'<br>';
}
?>


</body>
</html>

<?php
echo '<br/><br/>';
include('includes/footer.html');
?>

























