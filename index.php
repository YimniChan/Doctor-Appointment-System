<?php
$page_title ='Docpoint: Find A Doctor Near You | Book Appointments With Your Doctor Online';
include('includes/header.html');
require("includes/DBconnect.php");
?>
<html>
<style>body {
  background-image: url('imageuse/MBG.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}</style>

<body>
<div class="page-header"><h1><br/><br/>Find A Doctor Near You</h1></div>

<?php include('searchForm.php'); ?>

    <h4><b>Top specialties on Docpoint:</b></h4><br/>
  <div class="row">
    <div class="col-sm-1" ></div>
    <div class="col-sm-2" style="background-color:lavender;"> <a href="Doclist.php?searchtype=Specialties&searchterm=Dentist">
  <img src="imageuse/dentist.png" style="width:40px;height:40px;border:0;">Dentist</a></div>
    <div class="col-sm-1" ></div>
    <div class="col-sm-2" style="background-color:lavenderblush;"> <a href="Doclist.php?searchtype=Specialties&searchterm=Eye">
  <img src="imageuse/eye.png" style="width:40px;height:40px;border:0;">Eye</a></div>
    <div class="col-sm-1" ></div>
    <div class="col-sm-2" style="background-color:MediumTurquoise;"><a href="Doclist.php?searchtype=Specialties&searchterm=PrimaryCare">
  <img src="imageuse/care.png" style="width:40px;height:40px;border:0;">Primary Care</a></div>
    <div class="col-sm-1" ></div>
 	<div class="col-sm-2" style="background-color:lightcyan;"><a href="Doclist.php?searchtype=Specialties&searchterm=Gastroenterologist">
  <img src="imageuse/stomach.png"style="width:40px;height:40px;border:0;">Gastroenterologist</a></div>
   </div>
	<br/>
   <div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-2" style="background-color:Lightpink;"><a href="Doclist.php?searchtype=Specialties&searchterm=Psychiatrist">
  <img src="imageuse/Psychiatrist.png"  style="width:40px;height:40px;border:0;">Psychiatrist</a></div>
    <div class="col-sm-1" ></div>
    <div class="col-sm-2" style="background-color:Mistyrose;"><a href="Doclist.php?searchtype=Specialties&searchterm=OBGYN">
  <img src="imageuse/OBGYN.png"style="width:40px;height:40px;border:0;">OBGYN</a></div>
    <div class="col-sm-1" ></div>
    <div class="col-sm-2" style="background-color:paleturquoise;"><a href="Doclist.php?searchtype=Specialties&searchterm=ENT">
  <img src="imageuse/usericon1.png"style="width:40px;height:40px;border:0;">ENT</div>
    <div class="col-sm-1" ></div>
    <div class="col-sm-2" style="background-color:Plum;"><a href="Doclist.php?searchtype=Specialties&searchterm=Dermatologist">
  <img src="imageuse/skin.png" style="width:40px;height:40px;border:0;">Dermatologist</a></div>
   </div>
<br/><br/>

<h4><b>Announcement:</b></h4>
<br/>
<?php
$query  = "SELECT Title, Postbody FROM News ORDER BY nid DESC LIMIT 4";
$stmt = $dbc->prepare($query);
$stmt->execute();
$stmt->store_result();
$stmt-> bind_result($Title, $Postbody);
while ($stmt->fetch()){
	echo "<b>".$Title."</b><br/>".$Postbody."<br/>";
}


?>

</body>
</html>

<?php
echo'<br><br>';
include('includes/footer.html');
?>
