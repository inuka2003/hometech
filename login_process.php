<?php
session_start();
include("db.php");
$pagename="Your Login Results"; 
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; 
echo "<title>".$pagename."</title>";

echo "<body>";
include ("headfile.html");

echo "<h4>".$pagename."</h4>";

$email = $_POST['l_email'];
$password = $_POST['l_password'];
if (empty($email) or empty($password)) 
{
 echo "<p><b>Login failed!</b>"; 
 echo "<br>login form incomplete";
 echo "<br>Make sure you provide all the required details</p>";
 echo "<br><p> Go back to <a href=login.php>login</a></p>";
}
else
{
 $SQL = "SELECT * FROM users WHERE userEmail = '".$email."'"; 
 $exeSQL = mysqli_query($conn, $SQL) or die (mysqli_error($conn));
 $nbrecs = mysqli_num_rows($exeSQL); 
		if ($nbrecs ==0) 
		{
			 echo "<p><b>Login failed!</b>"; 
			 echo "<br>Email not recognised</p>";
			 echo "<br><p> Go back to <a href=login.php>login</a></p>";

		}
		else
		{
			$arrayuser = mysqli_fetch_array($exeSQL); //create array of user for this email

		if ($arrayuser['userPassword'] <> $password) //if the pwd in the array matches the pwd entered in the form
		{
		 echo "<p><b>Login failed!</b>"; 
		 echo "<br>Password not valid</p>";
		 echo "<br><p> Go back to <a href=login.php>login</a></p>";
		 }
		 else
		 {
			 echo "<p><b>Login success</b></p>"; 
			 $_SESSION['userid'] = $arrayuser['userId']; //create session variable to store the user id
			 $_SESSION['fname'] = $arrayuser['userFName']; //create session variable to store the user first name
			 $_SESSION['sname'] = $arrayuser['userSName']; //create session variable to store the user surname
			 $_SESSION['usertype'] = $arrayuser['userType']; //create session variable to store the user type
			 echo "<p>Welcome, ". $_SESSION['fname']." ".$_SESSION['sname']."</p>"; //display welcome greeting

		 if ($_SESSION['usertype']=='C') //if user type is C, they are a customer
		 {
		 echo "<p>User Type: homteq Customer</p>";
		 }
		 if ($_SESSION['usertype']=='A') //if user type is A, they are an admin
		 {
		 echo "<p>User type: homteq Administrator</p>";
		 }

		 echo "<br><p>Continue shopping for <a href=index.php>Home Tech</a>";
		 echo "<br>View your <a href=basket.php>Smart Basket</a></p>";
		 }
}
}
include("footfile.html");
//include head layout
echo "</body>";
?>