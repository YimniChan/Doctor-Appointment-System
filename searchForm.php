<body>
<form action="Doclist.php" method="GET">
      <select name="searchtype" style="height:27px">
      <option value="Specialties">Specialties
      <option value="Procedure">Procedure
      <option value="DoctorName">Doctor Name
    </select>
    <input name="searchterm" type="text" placeholder="For example: Dentist" size="40">
    <input name="location" type="text" placeholder="zip code" size="30">
    <input name="date" type="date" >
    <input name="insurance" type="text" placeholder="insurance carrier & plan">
    <input name="submit" type="submit" class="btn btn-info" style="height:27px" value="Search">
  </form>
<br/><br/>
</body>