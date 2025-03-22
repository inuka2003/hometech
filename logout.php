<?php
session_start();
$pagename="logout"; 

echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; 
echo "<title>".$pagename."</title>"; 

echo "<body>";

include ("headfile.html"); 

echo "<h4>".$pagename."</h4>"; 


echo "<p> Thank you, ".$_SESSION['fname']." ".$_SESSION['sname']."</p>"; 
unset($_SESSION); 
session_destroy(); 
echo "<br><p>You are now logged out</p>";

include("footfile.html"); 
echo "</body>";
?>