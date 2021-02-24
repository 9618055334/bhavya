<?php
 $year = $_GET['year'];
 $semester = $_GET['semester'];

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

 $query = "select * from Syllabus where year=$year and semester=$semester";
 $timetables = mysqli_query($conn, $query);
 $link = "window.location.href=";
 $website = "deletesyllabus.php?syllabusid";
 echo "<table border='1' style='border-collapse:collapse;width:100%;text-align:center;'>";
 echo "<tr>";
 echo "<th>Name</th>";
 echo "<th>year</th>";
 echo "<th>Semester</th>";
 echo "<th>Download</th>";
 echo "<th>Update</th>";
 echo "</tr>";
 while($row = mysqli_fetch_array($timetables)) {
   $query = $row['id'];
   echo "<tr>";
   echo "<td>".$row['name']."</td>";
   echo "<td id='year_s'>".$row['year']."</td>";
   echo "<td id='semester_s'>".$row['semester']."</td>";
   echo "<td>";
   echo "<a id='delete' href='#' style='text-decoration:none;'><button id='del_syllabus' style='background-color:green; color:black;' onclick='deleteSyllabus();'>Delete</button></a>";
   echo "</td>";
   echo "<td>";
   echo "<button style='background-color:green; color:black;'><a id='download' href=".$website."=".$query." style='text-decoration:none;'>Update</a></button>";
   echo "</td>";
   echo "</tr>";
 }
 echo "</table>";

?>
