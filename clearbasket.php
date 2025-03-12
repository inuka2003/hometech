<?php
session_start(); 
include("db.php"); 

$pagename = "Clear Smart Basket"; 

echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";
echo "<title>".$pagename."</title>"; 
echo "<body>";

include ("headfile.html"); // Include header layout file

echo "<h4>".$pagename."</h4>"; // Display name of the page on the web page

unset($_SESSION['basket']); // Clear the basket session
echo "<p>Your basket has been cleared!"; // Display confirmation message

echo "<br><p><a href='clearbasket.php'>CLEAR BASKET</a></p>";

include("footfile.html"); 
echo "</body>";
?>
