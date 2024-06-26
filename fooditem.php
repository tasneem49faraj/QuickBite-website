<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-ezXp0au7ExyXckuh0fLLov1PdHUGT3eb4V2pkBlN5W0HL9LbE1a0eK9POnb1wa4" crossorigin="anonymous">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<title>food</title>
<style>
  body {overflow-x: hidden;}  
  .card {
    box-shadow: 0 8px 12px 0 rgba(0, 0, 0, 0.2);
    max-width: 400px;
    margin: auto;
    text-align: center;
    font-family: arial;
    background-color:white;
    border-radius: 50px;

  
    
  }
  .h1{
font-size:22px;

  }
  .price {
    color: grey;
    font-size: 22px;
  }
  
  .card button {
    border: none;
    outline: 0;
    padding: 12px;
    color: white;
    background-color: #636e69;
    text-align: center;
    cursor: pointer;
    width: 50%;
    font-size: 18px;
  
  }
  
  .card button:hover {
    opacity: 0.7;
  }
  
 
 
body, html {
  padding: 0;
  margin: 0;
  background-color:#fff;
}

header{
  height: 170px;
  background-color:#636e69;

  padding: 20px 400px;
  text-align:center;

}

header h1 {
    margin: 0;
    font-size: 48px;
    color: #fff;

  }
  
  nav ul {
    list-style: none;
    padding: 0;
    margin: 0;

  }
nav ul li{
  display: inline;
  padding-top: 50px;
 margin-left: 20px;
 margin-top:30px;
 font-size:17px;
 
}
.container img{    
  border-radius: 50px;
}
.image-container:hover img {
    transform: scale(1.1);
    transition: 0.5s;
    z-index: 102;
}

.image-container {
    border-radius: 50px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4), 0 4px 8px rgba(0, 0, 0, 0.2);
}
 
  nav ul li a {
    text-decoration: none;
    color: #fff;
    font-weight: bold;
    transition: color 0.3s ease-in-out;
    padding-top:20px;
  }
  
  nav ul li a:hover {
    color: #b1b6b4;
  
  




}
</style>
</head>
<body>  
<header style=" width: 100%">

<nav>
<a href="#">
          <img src="img/logo.png" alt="LOGO" width="300 px" height="70 px"
        /></a>

  <br/><br/>
  <ul>
  <li><a href="homebage3"style="margin-left: -800px;font-size: 15px;">  Home page</a></li>
        <li><a href="profile.php"style="margin-left: 390px;">Profile</a></li>
        <li><a href="homebage3#Contact">Contact</a></li>
        <li><a href="homebage3#aboutus"style="margin-right: 400px;">About Us</a></li>
        <li><a href="cart.php">cart<i class="fas fa-shopping-cart"style="font-size: 24px;"></i>
       <li><a href="login.php"><i class="fas fa-sign-out-alt" style="font-size: 15px; margin-right: -780px;">logout</i></a></li>
  </ul>
</nav>

</header>

<br><br><br><br>






<?php
error_reporting(E_ERROR | E_PARSE);
if (isset($_GET['item'])) {


  $x = $_GET['item'];

}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quickbite";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
$PRODUCT_ID=array();
$CAT_ID = array();
$NAME = array();
$price = array();
$img1 = array();
$img2 = array();
$DESCRIPTION=array();
$CAT_TITLE=array();
$sql2="SELECT CAT_TITLE FROM category" ; 
$result2 = $conn->query($sql2);

$sql = "SELECT PRODUCT_ID, CAT_ID,NAME,PRICE, IMG1 ,IMG2 ,DESCRIPTION FROM product where CAT_ID = '$x'";  

$result = $conn->query($sql);


if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $PRODUCT_ID[] = $row['PRODUCT_ID'];
      $CAT_ID[] = $row['CAT_ID'];
      $NAME[] = $row['NAME'];
      $PRICE[] = $row['PRICE'];
      $IMG1[] = $row['IMG1'];
      $IMG2[] = $row['IMG2'];
      $DESCRIPTION[] = $row['DESCRIPTION'];
     
    }
  } else {
    echo "No data found.";
  }
  if ($result2->num_rows > 0) {
    while ($row2 = mysqli_fetch_assoc($result2)) {
        $CAT_TITLE[] = $row['CAT_TITLE'];
    
    }}
  

    for($i=0 ; $i < count($PRODUCT_ID) ; $i++){
        echo "
        <div class='container' >
        
        <div  class='row'  >
        
            <div class='col-md-4'>
            <div  class='card'  >
            <img src='".$IMG1[$i]."' alt=".$NAME[$i]." style='width: 300px; height: 230px; margin-top:35px'>
            <h1 class='h1'>".$NAME[$i]."</h1>
            <p class='price'>".$PRICE[$i]."$</p>
           
           
            <button class='btn' type='button' onclick='know(\"".$PRODUCT_ID[$i]."\")'>Learn more</button>
            </div>


              </div>
              " ;
              if ($i==count($PRODUCT_ID)-1)
              {
               break ;
              }
              echo"
              <div class='col-md-4'>
              <div  class='card'  >

              <img src='".$IMG1[$i=$i+1]."' alt=".$NAME[$i]." style='width:300px; height:230px; margin-top:35px'>
              <h1 class='h1'>".$NAME[$i]."</h1>
              <p class='price'>".$PRICE[$i]."$</p>
              <button class='btn' type='button' onclick='know(\"".$PRODUCT_ID[$i]."\")'>Learn more</button>
              </div>
              </div>
              " ;
              if ($i==count($PRODUCT_ID)-1)
              {
               break ;
              }
              echo"
              <div class='col-md-4'>
              <div  class='card'  >

              <img src='".$IMG1[$i=$i+1]."' alt=".$NAME[$i]." style='width:300px; height:230px; margin-top:35px'>
              <h1 class='h1'>".$NAME[$i]."</h1>
              <p class='price'>".$PRICE[$i]."$</p>
              <button class='btn' type='button' onclick='know(\"".$PRODUCT_ID[$i]."\")'>Learn more</button>
              </div>
              </div>
              </div>
              </div>
              </div>
              <br> <br>
              <br> <br>

              " ;
            
            }
            $conn->close();
            ?>

<script>
function know(number) {

  window.location.href = 'details.php?product=' + number;
}

</script>

</body>
</html>     
  