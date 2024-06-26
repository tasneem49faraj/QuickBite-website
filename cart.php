<?php

error_reporting(E_ERROR | E_PARSE);

session_start();
if (isset($_SESSION['id'])) {
    $customerId = $_SESSION['id'];}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quickbite";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch product data
$order_id = array();
$sqlorder = "SELECT ORDER_ID FROM orders where CUS_ID ='$customerId'";
$resultorder = $conn->query($sqlorder);

if ($resultorder->num_rows > 0) {
    while ($roworder = mysqli_fetch_assoc($resultorder)) {
        $order_id[] = $roworder['ORDER_ID'];
    }}


if (isset($_GET['send']) && $_GET['send'] === 'addorderpage' OR count($order_id) != 0) {


?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="storestyle.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <title>Cart</title>
<style>
    

        .message-box {
            margin-left:500px;
            padding: 20px;
            border: 2px solid #333;
            border-radius: 10px;
            text-align: center;
            font-size: 18px;
            max-width: 300px;
        }
    </style>
    </head>
    <body>



<?php
echo"<div class='message-box'>
<p>Your order is on its way to you! We hope you like it. It's our pleasure to serve you!</p>
</div>";

}
else{
////the cart
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quickbite";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch product data
$product_name = array();
$cat_id = array();
$product_price = array();
$product_img = array();

$sql = "SELECT NAME, CAT_ID, PRICE, IMG1 FROM product";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $product_name[] = $row['NAME'];
        $cat_id[] = $row['CAT_ID'];
        $product_price[] = $row['PRICE'];
        $product_img[] = $row['IMG1'];
    }
    
}

/*if ($result->num_rows == 0) {
    $_SESSION['order_id'] = uniqid();
    $order_id = $_SESSION['order_id'];
}

*/



// Cart functionality
if (isset($_SESSION['id'])) {
    $customerId = $_SESSION['id'];
   
    $_SESSION['ORDER_ID'] = $customerId;
     $order_id = $_SESSION['ORDER_ID'];

    if (isset($_GET['item'])) {
        $item_number = $_GET['item'];
        $quantity = 1;
        $price = $product_price[$item_number-1];

        // Check if the item already exists in the cart
        $existing_item_query = "SELECT * FROM items WHERE ORDER_ID = '$order_id' AND CUS_ID='$customerId' AND PRODUCT_ID = '$item_number'";
        $existing_item_result = $conn->query($existing_item_query);

        if ($existing_item_result->num_rows > 0) {
            // Item already exists, update the quantity
            $update_quantity_query = "UPDATE items SET QUANTITY = QUANTITY + 1 WHERE ORDER_ID = '$order_id' AND CUS_ID='$customerId' AND PRODUCT_ID = '$item_number'";

            if ($conn->query($update_quantity_query) === TRUE) {
                $back=$item_number;
                header("location: details.php?cart=addtocart&number=".$back);
                exit();
            } else {
                echo "Error updating item quantity: " . $conn->error;
            }
        } else {
            // Item does not exist, insert it
            $sol = "SET FOREIGN_KEY_CHECKS=0";
            $result1 = $conn->query($sol);

            $items = "INSERT INTO items (ORDER_ID, CUS_ID, PRODUCT_ID, QUANTITY, PRICE)
                      VALUES ('$order_id','$customerId', '$item_number', '$quantity', '$price')";

            if ($conn->query($items) === TRUE) {

                  $back=$item_number;
                header("location: details.php?cart=addtocart&number=".$back);
                exit();
            } else {
                echo "Error inserting item: " . $conn->error;
            }
        }
    }
}

// Fetch cart items
$product_id = array();
$quantity = array();
$price = array();

$sql = "SELECT PRODUCT_ID, QUANTITY, PRICE FROM items WHERE ORDER_ID = '$order_id' AND CUS_ID='$customerId'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $product_id[] = $row['PRODUCT_ID'];
        $price[] = $row['PRICE'];
        $quantity[] = $row['QUANTITY'];
    }
}

// Remove items
if (isset($_POST['remove_item'])) {
    $item_to_remove = $_POST['remove_item'];
    $remove_query = "DELETE FROM items WHERE ORDER_ID = '$order_id' AND  CUS_ID='$customerId' AND PRODUCT_ID = '$item_to_remove'";
    ?>
    <script>
    function removeItem(itemNumber) {
        var wrapperFailed = document.querySelector('.wrapper-failed');
        wrapperFailed.style.display = 'none';
        
        var form = document.createElement('form');
        form.method = 'post';
        form.action = 'cart.php';
    
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'remove_item';
        input.value = itemNumber;
        
        form.appendChild(input);
        document.body.appendChild(form);
        form.submit();
    }
    </script>
    <?php
    if ($conn->query($remove_query) === TRUE) {
      
        echo "
        <div class='wrapper-failed'>
          <div class='card' style='  border-left: 5px solid red;'>
            <div class='subject'>
              <h3>Removed</h3>
              <p>One item has been removed!</p>
            </div>
            <div class='icon-times'><button onclick='closeFailureMessage()'>X</button></div>
          </div>
        </div>
        <script>
          function closeFailureMessage() {
            var wrapperFailed = document.querySelector('.wrapper-failed');
            wrapperFailed.style.display = 'none';
          }
        </script>";
    } else {
        echo "Error removing item: " . $conn->error;
    }
}

// Update item quantity
if (isset($_POST['update_quantity'])) {
    $item_to_update = $_POST['update_quantity'];
    $new_quantity = $_POST['new_quantity'];

    // Update item quantity in the database
    $update_query = "UPDATE items SET QUANTITY = '$new_quantity' WHERE ORDER_ID = '$order_id' AND CUS_ID='$customerId' AND PRODUCT_ID = '$item_to_update'";

    if ($conn->query($update_query) === TRUE) {
        // Quantity updated successfully, you can redirect or refresh the page here
        header("location: cart.php");
        exit();
    } else {
        echo "Error updating quantity: " . $conn->error;
    }
}

// Calculate item total prices
$item_total_price = array();
for ($i = 0; $i < count($product_id); $i++) {
    $item_total_price[$i] = $price[$i] * $quantity[$i];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="storestyle.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<title>Cart</title>
<style>
    body{
    background-color: #F2F2F2;
  
 }  
table {
    table-layout: fixed;
    width: 100%;
    border: 3px solid #c0c5c3;
    background-color: white;
    margin-left: 200px;
    border-radius: 70px;

}

thead th:nth-child(1) {
    width: 20%;
}
thead th:nth-child(2) {
    width: 10%;
}
thead th:nth-child(3) {
    width: 15%;
}
thead th:nth-child(4) {
    width: 25%;
}
thead th:nth-child(5) {
    width: 10%;
}
thead th:nth-child(6) {
    width: 20%;
}
.wrapper-failed {
  position: fixed; /* Set the position to fixed */
  top: 20px; /* Adjust the top position as needed */
  right: 20px; /* Adjust the right position as needed */
  z-index: 9999; /* Set a high z-index to make sure it appears above everything */
}

.wrapper-failed .card {
  width: 300px; /* Adjust the width as needed */
  background-color: #fff;
  padding: 10px 20px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  border-left: 5px solid #28a745; /* Change border color to green for success messages */
  border-radius: 3px;
  box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
}
</style>
</head>
<body>


<h1 style="text-align:center;color:#83717D;">MY CART</h1>
<br><br><br>

<div class="col-lg-8">
    <table class="table center">
    <thead>
            <th style="color:#83717D;">Items</th>
                <th style="color:#83717D;">Price</th>
                <th style="color:#83717D;">Image</th>
                <th style="color:#83717D;">Quantity</th>
                <th style="color:#83717D;">Total Price</th>
                <th style="text-align:center;color:#83717D;">Remove</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Loop through cart items and display them
            for ($i = 0; $i < count($product_id); $i++) {
                $item_number = $product_id[$i];
                $item_quantity = $quantity[$i];
                $item_price = $price[$i];
                $item_name = $product_name[$item_number-1];
                $item_img = $product_img[$item_number-1];
                $item_total = $item_total_price[$i];

                echo "
                <tr>
                    <td>$item_name</td>
                    <td>$item_price</td>
                    <td><img src='$item_img' alt='$item_name' style='width: 50px; height: 50px;'></td>
                    <td>
                        <form method='post' action='cart.php'>
                            <input type='hidden' name='update_quantity' value='$item_number'>
                            <input class='text-center' type='number' min='1' max='10' name='new_quantity' value='$item_quantity'>
                            <button class='btn btn-outline-primary' type='submit'>Update</button>
                        </form>
                    </td>
                    <td>$item_total</td>
                    <td style='text-align: center;'>
                    <form method='post' action='cart.php'>
                        <input type='hidden' name='remove_item' value='$item_number'>
                        <button class='btn btn-outline-danger' type='submit'>REMOVE</button>
                    </form>
                </td>
                
                </tr>
                ";
            }
            ?>
        </tbody>
    </table>
    
<form method="post" action="addorder.php">
    <input type="submit" value="Checkout" style="margin-left:600px;color:#996666">
</form>
</div>



</body>
</html>
<?php } ?>