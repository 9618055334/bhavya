<?php
 $year = $_GET['year'];
 $semester = $_GET['semester'];
 $section = $_GET['section'];

 $conn = mysqli_connect("localhost","root","","Fileupload");

 if(!empty($_POST['year'])) {
     foreach($_POST['year'] as $yearSelected) {
         $year = $yearSelected;
         echo "Selected Year: ".$year;
     }
 }
 if(!empty($_POST['semester'])) {
     foreach($_POST['semester'] as $semSelected) {
         $semester = $semSelected;
         echo "Selected Semester: ".$semSelected;
     }
 }
 if(!empty($_POST['section'])) {
     foreach($_POST['section'] as $sectionSelected) {
         $section = $sectionSelected;
         echo "Selected Section: ".$sectionSelected;
     }
 }

 $query = "select * from Materials where year=$year and semester=$semester and section='$section'";
 $timetables = mysqli_query($conn, $query);
 $link = "window.location.href=";
 $website = "deletetimetables.php?timetableid";
 echo "<table border='1' style='border-collapse:collapse;width:100%;text-align:center;'>";
 echo "<tr>";
 echo "<th>Name</th>";
 echo "<th>year</th>";
 echo "<th>Semester</th>";
 echo "<th>Section</th>";
 echo "<th>Download</th>";
 echo "<th>Update</th>";
 echo "</tr>";
 while($row = mysqli_fetch_array($timetables)) {
   $query = $row['id'];
   echo "<tr>";
   echo "<td>".$row['name']."</td>";
   echo "<td id='year_m'>".$row['year']."</td>";
   echo "<td id='semester_m'>".$row['semester']."</td>";
   echo "<td id='section_m'>".$row['section']."</td>";
   echo "<td>";
   echo "<a id='delete' href='#' style='text-decoration:none;'><button id='del_timetable' style='background-color:green; color:black;' onclick='deleteMaterials();'>Delete</button></a>";
   echo "</td>";
   echo "<td>";
   echo "<button style='background-color:green; color:black;'><a id='download' href=".$website."=".$query." style='text-decoration:none;'>Update</a></button>";
   echo "</td>";
   echo "</tr>";
 }
 echo "</table>";

?>
