<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quickbite";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
$NAME="NAME";
$PRICE="PRICE";
$IMG1="IMG1";
$IMG2="IMG2";
$DESCRIPTION="DESCRIPTION";
$CAT_TYPE="CAT_TYPE";
  
    function test_input($data)
    {
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }
    
    $NAME=test_input($_POST['NAME']);
    $PRICE=test_input($_POST['PRICE']);
    $IMG1=test_input($_POST['IMG1']);
    $IMG2=test_input($_POST['IMG2']);
    $DESCRIPTION=test_input($_POST['DESCRIPTION']);
    $CAT_TYPE=test_input($_POST['CAT_TYPE']);

    //cat_type to cat_id

switch($CAT_TYPE)
{
case "Main Course" :
    $CAT_ID=1;
    break;

    case "Side Dishes":
        $CAT_ID=2 ;
    break;

    case "Drinks" :
        $CAT_ID=3;
        break;
        
    case "Desserts":
        $CAT_ID=4;
        break;    
    case "Fresh Bakery":
        $CAT_ID=5;
     break;        

}
// fix


$sql="INSERT INTO product (NAME , PRICE , IMG1 ,IMG2 ,DESCRIPTION ,CAT_ID)
        values ('$NAME' ,'$PRICE' ,'$IMG1', '$IMG2' ,'$DESCRIPTION' ,'$CAT_ID')";
        
         if ($conn->query($sql) === TRUE) {
            header("location: additem.php");
            exit();
        } else {
            echo "Error inserting item: " . $conn->error;
        }

}
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <style>
        body {
            background: #6e6368;
            font-family: 'Roboto', sans-serif;
        }
        nav {padding-left: 40px;
 }
 
 nav ul {
   list-style-type: none;
   margin: 0;
   padding: 0;
   display: flex;
  
 }
 
 nav li {
   margin: 0 10px;
 }
 
 nav li a {
   display: block;
   color: #fff;
   text-decoration: none;
   padding: 10px;
   border-radius: 4px;
   transition: background-color 0.3s ease;
 }
 
 nav li a:hover {
   background-color: #555;
   text-decoration: none;
   color: #fff;
 }

 .vl {
   border-left: 2px solid rgb(65, 65, 65);
   height: 32px;
 }

h1 {

  font-size: 30px;
  color: #fff;
  text-transform: uppercase;
  font-weight: 300;
  text-align: center;
  margin-bottom: 15px;
}
#catigoriy option {
            width: 100px;
        section {
            margin: 50px;
        }}

        .form-container {
            background-color: rgba(255, 255, 255, 0.3);
            padding: 20px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 30px;
            margin-bottom: 20px;
            width:60%;
            text-align:center;
            margin-left:250px;
            color:#404231;

        }

        .form-container label {
            font-weight: 500;
            font-size: 15px;
            color: #404231;
            display: block;
            margin-bottom: 12px;
        }

        .form-container input[type="text" ],
        .form-container textarea {
            width: 50%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-container button {
            padding: 15px 25px;
            background-color: #6e6368;
            border: none;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-container button:hover {
            background-color: #636e69;
        }
    </style>
    <title>Add product</title>
</head>
<body>
    <h1 style="color:white;font-family:Bradley Hand, cursive; padding-left:20px;  padding-top:30px; padding-bottom:30px;">quickbite Admin </h1>
    <nav>
        <ul>
            <li><a href="admin.php">massages</a></li>
            <li><a href="ADD.php">Add product</a></li>
            <li><a href="orders.php">Orders</a></li>

            <div class="vl"></div>
        </ul>
        <hr>
    </nav>
    <br><br><br><br>

    <section>
        <div class="form-container">
            <h2>Add to the menu</h2>
            <form method="post" action="ADD.php">
                <label for="NAME">Dish Name:</label>
                <input type="text" id="NAME" name="NAME" required>
            
                <label for="PRICE">Dish Price:</label>
                <input type="text"  id="PRICE" name="PRICE"  required></input>
                
                <label for="DESCRIPTION">Dish Description:</label>
                <input type="text"  id="DESCRIPTION" name="DESCRIPTION"  required></input>

                <label for="IMG1">Dish IMG:</label>
                <input type="text" id=" IMG1" name="IMG1"  required></input>
                <label for="IMG2">Dish IMG:</label>
                <input type="text" id=" IMG2" name="IMG2"  required></input>
                <label for="CAT_TYPE">Category:</label>
                <input list="categoriy" id="CAT_TYPE" name="CAT_TYPE" style="width: 150px; " required>
                    <datalist id="categoriy">

                       <option value="Main Course" />
                       <option value="Said Dishes" />
                       <option value="Drinks" />
                       <option value="Desserts" />
                       <option value="Fresh Bakery" />

                    </datalist>
                    <br><br>
                <button type="submit">Submit</button>
            </form>
        </div>
    </section>
</body>
</html>
