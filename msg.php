<?php

if (isset($_GET['msg'])) {
  $msgsuccess = $_GET['msg'];

  if ($msgsuccess === 'msgsuccess') {
      echo "
      <div class='wrapper-failed'>
        <div class='card'>
          <div class='subject'>
            <h3>Success</h3>
            <p>Your message was sent successfully.</p>
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


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="styles.css" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>

    <title>Send a Message</title>

    <style>
      .row {
        width: 100% !important;
        height: 100% !important;
        text-align: center;
        padding: 10px;
      }
      body {
        font-family: "Arial", sans-serif;
        background-color: #f0f0f0;
      }




      hr {
        border: none;
        border-top: 1px solid #ddd;
        margin: 20px 0;
      }

      .container {
        background-color: #fff;
        padding: 20px;
        border-radius: 50px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin: 20px auto;
        max-width: 800px;
        text-align: center;
        box-shadow: 5px 10px #e8e8e8;

      }

      label {
        font-size: 18px;
      }

      input[type="email"],
      input[type="text"] {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ddd;
        border-radius: 5px;
      }
      .main {
  margin: 0 auto;
  padding: 4rem 0;
  width: 90%;
  max-width: 60rem;
}
      input[type="submit"] {
        background-color: #636e69;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
      }
      .container:hover {
        transform: scale(1.1);
      }

      input[type="submit"]:hover {
        background-color: #6e6368;
      }

      .wrapper-failed {
  position: fixed; 
  top: 20px; 
  right: 20px; 
  z-index: 9999; 
}

.wrapper-failed .card {
  width: 300px; 
  background-color: #fff;
  padding: 10px 20px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  border-left: 5px solid #28a745;
  border-radius: 3px;
  box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
}

    </style>
  </head>
  <body>
  <header style="position:fixed; width: 100%">

<nav>
  <li><a href="#" > <img src="img/logo.png" alt ="LOGO" width="300 px" height="70 px"></a></li>
  <br>
  <ul>
    <li><a href="#">Home</a></li>
    <li><a href="#">Menu</a></li>
    <li><a href="#">Contact</a></li>
    <li><a href="#">About Us</a></li>

  </ul>
</nav>

</header>
<br><br><br><br><br>





 <div style=" background-color: white;">
 

<hr>
    </div>
    <div class="main">
      <div class="container">
        <div class="">
          <div>
            <form action="msg-val" method="Post">
            <label for="username">Your user name </label>
            <br>
    <input type="text" id="username" name="username">
              <label for="email">Your email</label>
              <br />
              <input type="email" id="email" name="email" />
              <br/><br/>
              <label for="msg">Your message</label>
              <br />
              <textarea
                style="width: 100%; height: 300px; border:2px solid #ddd;"
                name="msg"
                id="msg"
                type="text"
              ></textarea>
              <br /><br />
              <input type="submit" value="Send " />
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html