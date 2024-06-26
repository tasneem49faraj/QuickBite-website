<?php
session_start();

$theid = $_SESSION['ORDER_ID'];
$customerId = $_SESSION['id'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quickbite";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch product data
$price = array();
$quantity = array();
$sql = "SELECT PRICE, QUANTITY FROM items WHERE CUS_ID='$customerId' AND ORDER_ID ='$theid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Remove the dollar sign and convert to numeric value
        $price[] = floatval(str_replace('$', '', $row['PRICE']));
        $quantity[] = $row['QUANTITY'];
    }
}

$total_amount = 0;
$i=0;

for ($i = 0; $i < count($price); $i++) {
    $total_amount += $price[$i] * $quantity[$i];
}



    
    
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $neworder = "INSERT INTO orders (ORDER_ID, CUS_ID, ORDER_DATE, TOTAL_AMOUNT)
                 VALUES ('$theid', '$customerId', CURRENT_DATE, $total_amount)";
    $result2 = $conn->query($neworder);
    if ($result2) {

        header("Location:cart.php?send=addorderpage");
        exit(); }
  
}
?>








