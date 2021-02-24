<?php
 $event = $_GET['events'];

 $conn = mysqli_connect("localhost","root","","Fileupload");

//  if(!empty($_GET['events'])) {
//      foreach($_GET['events'] as $selectedEvent) {
//          $event = $selectedEvent;
//          echo "Selected Year: ".$event;
//      }
//  }  


 $query = "select * from events where typeof='$event'";
 $events = mysqli_query($conn, $query);
 $link = "window.location.href=";
 $website = "deleteevents.php?eventid";
 echo "<table border='1' style='border-collapse:collapse;width:100%;text-align:center;'>";
 echo "<tr>";
 echo "<th>Name</th>";
 echo "<th>Event Type</th>";
 echo "<th>Download</th>";
 echo "<th>Update</th>";
 echo "</tr>";
 while($row = mysqli_fetch_array($events)) {
   $query = $row['id'];
   echo "<tr>";
   echo "<td>".$row['name']."</td>";
   echo "<td id='typeof_t'>".$row['typeof']."</td>";
   echo "<td>";
   echo "<a id='delete' href='#' style='text-decoration:none;'><button id='del_timetable' style='background-color:green; color:black;' onclick='deleteEvents();'>Delete</button></a>";
   echo "</td>";
   echo "<td>";
   echo "<button style='background-color:green; color:black;'><a id='download' href=".$website."=".$query." style='text-decoration:none;'>Update</a></button>";
   echo "</td>";
   echo "</tr>";
 }
 echo "</table>";

?>
