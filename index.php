<?php
include("db.php"); // include db.php file to connect to DB
$pagename = "Make your home smart"; // create and populate variable called $pagename

// Include CSS and set page title
echo "<link rel='stylesheet' type='text/css' href='mystylesheet.css'>";
echo "<title>" . $pagename . "</title>";
echo "<body>";

// Include header file
include("headfile.html");

// Display the page name as heading
echo "<h4>" . $pagename . "</h4>";

// Create a $SQL variable and populate it with a SQL statement that retrieves product details
$SQL = "SELECT prodId, prodName, prodPicNameSmall, prodDescripShort, prodPrice FROM Product";

// Run SQL query for connected DB or exit and display error message
$exeSQL = mysqli_query($conn, $SQL) or die(mysqli_error($conn));

// Create the table for displaying product details
echo "<table style='border: 0px'>";

// Create an array of records (2-dimensional variable) called $arrayp.
// Populate it with the records retrieved by the SQL query previously executed.
// Iterate through the array
while ($arrayp = mysqli_fetch_array($exeSQL)) {
    echo "<tr>";
    echo "<td style='border: 0px'>";

    // Make the image into an anchor tag to prodbuy.php and pass the product id by URL (GET method)
    echo "<a href='prodbuy.php?u_prod_id=" . $arrayp['prodId'] . "'>";
    
    // Display the small image whose name is contained in the array
    echo "<img src='images/" . $arrayp['prodPicNameSmall'] . "' height='200' width='200'>";
    
    // Close the anchor tag
    echo "</a>";
    echo "</td>";
    
    echo "<td style='border: 0px'>";

    // Display product name as contained in the array
    echo "<p><h5>" . $arrayp['prodName'] . "</h5>";
    
    // Display the short description of the product
    echo "<p>" . $arrayp['prodDescripShort'] . "</p>";

    // Display the price of the product with the pound symbol
    echo "<p>&pound" . number_format($arrayp['prodPrice'], 2) . "</p>";

    echo "</td>";
    echo "</tr>";
}

echo "</table>";

// Include footer file
include("footfile.html");

// Close the body tag
echo "</body>";
?>
