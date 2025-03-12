<?php
include("db.php"); // Include the database connection

$pagename = "A smart buy for a smart home"; // Update the page name for prodbuy.php

echo "<link rel='stylesheet' type='text/css' href='mystylesheet.css'>"; // Call in the stylesheet
echo "<title>" . $pagename . "</title>"; // Display name of the page as window title

echo "<body>";

include("headfile.html"); // Include header layout file

// Display the page name as the heading
echo "<h4>" . $pagename . "</h4>"; 

// Retrieve the product ID passed from the previous page using the GET method
if (isset($_GET['u_prod_id'])) {
    $prodid = $_GET['u_prod_id'];
    
    // Create the SQL query to retrieve product details
    $SQL = "SELECT prodId, prodName, prodPicNameLarge, prodDescripLong, prodPrice, prodQuantity
            FROM Product
            WHERE prodId = " . $prodid;

    // Execute the SQL query
    $exeSQL = mysqli_query($conn, $SQL) or die(mysqli_error($conn));

    // Fetch the result as an associative array
    $arrayp = mysqli_fetch_array($exeSQL);

    // Display product details in a table format
    echo "<table style='border: 0px'>";
    echo "<tr>";
    
    // Display the large product image
    echo "<td style='border: 0px'>";
    echo "<img src='images/" . $arrayp['prodPicNameLarge'] . "' height='350' width='350'>";
    echo "</td>";
    
    // Display the product name, long description, price, and stock quantity
    echo "<td style='border: 0px'>";
    echo "<p><h5>" . $arrayp['prodName'] . "</h5></p>";
    echo "<br><p>" . $arrayp['prodDescripLong'] . "</p>";
    echo "<br><p><b>&pound" . $arrayp['prodPrice'] . "</b></p>";
    echo "<br><p>Number left in stock: " . $arrayp['prodQuantity'] . "</p>";
    
    // Create a form for the user to select the quantity to purchase using a drop-down list
    echo "<br><p>Number to be purchased: ";
    echo "<form action='basket.php' method='post'>";
    
    // Create the drop-down list with options from 1 to the available stock
    echo "<select name='p_quantity'>";
    for ($i = 1; $i <= $arrayp['prodQuantity']; $i++) {
        echo "<option value='" . $i . "'>" . $i . "</option>";
    }
    echo "</select>";

    // Submit button to add to basket
    echo "<input type='submit' name='submitbtn' value='ADD TO BASKET' id='submitbtn'>";
    
    // Pass the product ID to the next page (basket.php) as a hidden field
    echo "<input type='hidden' name='h_prodid' value='" . $prodid . "'>";
    echo "</form>";
    echo "</p>";
    
    echo "</td>";
    
    echo "</tr>";
    echo "</table>";
    
} else {
    echo "<p>No product selected.</p>";
}

// Include the footer layout file
include("footfile.html");

echo "</body>";
?>
