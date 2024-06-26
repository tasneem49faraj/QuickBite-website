<?php
session_start();
error_reporting(E_ERROR | E_PARSE);

if (isset($_GET['cart'])) {
  $cart = $_GET['cart'];
  if ($cart === 'addtocart') {
    echo "
    <div class='wrapper-failed'>
      <div class='card' style='border-left: 5px solid lightgreen;'>
        <div class='subject'>
          <h3>Success</h3>
          <p>add to cart!</p>
        </div>
        <div class='icon-times'><button onclick='closeFailureMessage()'>X</button></div>
      </div>
    </div>
    <script>
      function closeFailureMessage() {
        var wrapperFailed = document.querySelector('.wrapper-failed');
        wrapperFailed.style.display = 'none';
      }
    </script>
    ";
  }
}

$Y = $_SESSION['username'];

if (isset($_GET['product']) || isset($_GET['number'])) {
  $i = isset($_GET['product']) ? $_GET['product'] : $_GET['number'];
  $_SESSION['pro'] = $i;
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quickbite";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$PRODUCT_ID = array();
$CAT_ID = array();
$NAME = array();
$PRICE = array();
$IMG1 = array();
$IMG2 = array();
$DESCRIPTION = array();
$CAT_TITLE = array();

$sql = "SELECT PRODUCT_ID, CAT_ID, NAME, PRICE, IMG1, IMG2, DESCRIPTION FROM product WHERE PRODUCT_ID='$i'";
$sql2 = "SELECT CAT_TITLE FROM category";
$result = $conn->query($sql);
$result2 = $conn->query($sql2);

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
  }
}

$theid = $_SESSION['pro'];

$sqlnew = "SELECT COMMENT, USERNAME FROM comment WHERE  PRODUCT_ID= $theid";
$resultnew = $conn->query($sqlnew);

$commenttable = array();
$usernametable = array();

if ($resultnew->num_rows > 0) {
  while ($rownew = mysqli_fetch_assoc($resultnew)) {
    $commenttable[] = $rownew['COMMENT'];
    $usernametable[] = $rownew['USERNAME'];
  }
}

if (isset($_GET['comment'])) {
  $comment = $_GET['comment'];

  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  $cflag = "0";
  if (empty($comment)) {
    $cflag = "write a comment";
  } else {
    $comment = test_input($_GET['comment']);
  }

  if ($cflag != "0") {
    echo "Failed... Please write a comment";
  } else {
    $sql3 = "SELECT CUS_ID FROM customer WHERE USERNAME='$Y'";
    $result3 = $conn->query($sql3);

    if ($result3 && $result3->num_rows > 0) {
      $row3 = $result3->fetch_assoc();
      $Cus_ID = $row3['CUS_ID'];

      $sql = "INSERT INTO comment (COMMENT, CUS_ID, USERNAME, PRODUCT_ID) VALUES (?, ?, ?, ?)";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("sisi", $comment, $Cus_ID, $Y, $theid);

      if ($stmt->execute()) {
        header("Location: details.php?product=$theid");
        exit;
      } else {
        echo "Error: " . $stmt->error;
      }

      $stmt->close();
    } else {
      echo "Error: Unable to fetch CUS_ID.";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <script>
    function closeFailureMessage() {
      var wrapperFailed = document.querySelector('.wrapper-failed');
      wrapperFailed.style.display = 'none';
    }

    function changeImage(newImageSource) {
      var mainImage = document.getElementById("imggg");
      mainImage.src = newImageSource;
    }

    function addcart(cartitem) {
      window.location.href = 'cart.php?item=' + cartitem;
    }
  </script>
  <style>
    body {
      padding: 0;
      margin: 0;
      background-color: #E6E6E6;
    }

    .contante {
      background-color: #fff;
      width: 66.25em;
      box-shadow: 0 5px 25px rgba(1, 1, 1, 15%);
      border-radius: 40px;
      height: 550px;
      margin-left: 130px;
      margin-top: 60px;
    }

    .contante33 {
      padding-top: 1px;
      border-radius: 20px;
      display: block;
      margin-right: 30px;
    }

    .contantee2 {
      display: flex;
      justify-content: right;
      padding: 50px;
    }

    .tit1 {
      font-size: 23px;
      margin-left: 20px;
      color: #54545C;
    }

    .tit2 {
      font-size: 40px;
      color: #996666;
    }

    .long-text {
      max-height: 100px;
      overflow: auto;
      padding: 10px;
    }

    .buttonn {
      display: inline;
      position: relative;
    }

    .buttonn button {
      background-color: white;
      color: black;
      border: 2px solid #c6c09c;
      cursor: pointer;
    }

    .contante33 button {
      border: none;
      background: none;
      padding: 0;
      cursor: pointer;
    }

    #bu4 {
      width: 280px;
      height: 50px;
      display: block;
      background-color: #6e6368;
      font-size: 20px;
      position: relative;
      color: #fff;
      border: 1px solid #996666;
      cursor: pointer;
      border-radius: 100px;
    }

    .conn2 input[type="submit"] {
      position: absolute;
    }

    .conn2 {
      margin-right: 300px;
      top: 350px;
      right: -80px;
      position: absolute;
    }

    .conn2 input {
      width: 750px;
      height: 60px;
      border: 1px solid #996666;
      border-radius: 20px;
    }

    .comments-container {
      margin-top: 100px;
      padding: 10px;
      border: 40px solid #D2D2D2;
      border-radius: 5px;
      background-color: #D2D2D2;
      display: flex;
      flex-direction: column;
      margin-left: 120px;
      width: 75%;
      border-radius: 20px;
    }

    .comment {
      margin-bottom: 10px;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 10px;
      background-color: #fff;
    }

    .comment p {
      margin: 0;
    }

    .b {
      border: none;
      background: #D2D2D2;
      padding: 10px;
      cursor: pointer;
    }

    .comment strong {
      font-weight: bold;
      color: #996666;
    }

    .details {
      display: fixed;
      position: relative;
      margin-left: 30px;
    }

    .msg-textarea {
      width: 70%;
      height: 50px;
      margin-left: 120px;
    }
  </style>
</head>

<body>
  <header></header>
  <main class="main1">
    <div class="contante">
      <div class="contantee2">
        <div class="contante33">
          <?php
          echo "
          <button onclick=\"changeImage('" . $IMG1[0] . "')\">
            <img
              src='" . $IMG1[0] . "'
              alt='details1'
              width='150px'
              height='100px'
              style='margin-top: 30px; border-radius: 10px'
            />
          </button>
          <br />
          <button onclick=\"changeImage('" . $IMG2[0] . "')\">
            <img
              src='" . $IMG2[0] . "'
              alt='details2'
              width='150px'
              height='100px'
              style='border-radius: 10px'
            />
          </button>
          </div>

          <img
            id='imggg'
            src='" . $IMG2[0] . "'
            alt='details3'
            width='300px'
            height='300px'
            style='margin-bottom: 60px; border-radius: 10px'
          /> 
          <div class ='details'>
          <h1 class='tit1'>" . $NAME[0] . "</h1>
          <div class='long-text'>" . $DESCRIPTION[0] . "</div>
          <h2 class='tit2'>" . $PRICE[0] . "$</h2>
          <button id='bu4' value='cart' onclick='addcart(" . $i . ")' >Add to cart</button>
          <div class='conn2'>
            <label>Note:</label>

            <input type='text' />
          </div>";
          ?>
        </div>
      </div>
    </div>
  </main>
  <footer>
    <div class="comments-container">
      <h2>Comments</h2>
      <?php foreach ($commenttable as $index => $comment) { ?>
        <div class="comment">
          <p><strong><?php echo htmlspecialchars($usernametable[$index]); ?>:</strong></p>
          <p><?php echo htmlspecialchars($comment); ?></p>
        </div>
      <?php } ?>
    </div>
    <form action="details.php" method="GET">
      <br />
      <textarea class="msg-textarea" name="comment" id="comment" type="text"></textarea>
      <input class="b" type="submit" value="Send a comment" />
    </form>
    <br><br><br><br><br>
  </footer>
</body>

</html>

