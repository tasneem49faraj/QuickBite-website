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

    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-ezXp0au7ExyXckuh0fLLov1PdHUGT3eb4V2pkBlN5W0HL9LbE1a0eK9POnb1wa4" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <style>
      header {
        height: 170px;
        background-color: #636e69;

        padding: 20px 400px;
        text-align: center;
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
      nav ul li {
        display: inline;
        padding-top: 50px;
        margin-left: 20px;
        margin-top: 30px;
        font-size: 17px;
      }

      nav ul li a {
        text-decoration: none;
        color: #fff;
        font-weight: bold;
        transition: color 0.3s ease-in-out;
        padding-top: 20px;
      }

      nav ul li a:hover {
        color: #b1b6b4;
      }
      .cont {
        display: flex;
      }
      
      .cont h1 {
        position: absolute;
        top: 200px;
        left: 450px;
        font-family: "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif;
        font-weight: 700;
        color: #fff;
        border-radius: 10px;
        box-shadow: 0 5px 25px rgba(1, 1, 1, 15%);
        width: 500px;
        height: 200px;
        padding: 30px 100px;
        margin: 50px;
      }
      .con2{
  display: flex;
  justify-content:start;
  flex-direction: row;
  flex-wrap:initial;
  position: absolute;
  top:500px;
 
}
.con3{
  border-radius: 10px;
  box-shadow: 0 5px 25px rgba(1, 1, 1, 15%);;
width: 230px;
height: 180px;
padding: 20px 40px;
margin: 10px;
margin-left: 20px;
transition: 0.7s ease;
background-color: #fff;
}
.con3:hover{

  transform: scale(1.1);
}
.icon a{
  font-size:40px ;
  display: inline-block;
  color:#636e69;
  padding-left:60px ;
}
.about {
    text-align: center;

  }
.bu2{
  border:none;
  background:none;
  cursor: pointer;
  font-size:40px ;
  color:#636e69;
padding-left:45px;
}
  .content {
    max-width: 800px;
    margin: 0 auto;
    padding: 40px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
  }
  
  .content h2 {
    font-size: 36px;
    margin-bottom: 20px;
    color: #81526E;
    text-transform: uppercase;
  }
  
  .content p {
    font-size: 18px;
    margin-bottom: 20px;
    color: #636e69;
  }
  
  .animation-container {
    height: 100px;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
  }
  
  .motivation-box {
    width: 50px;
    height: 50px;
    background-color: #81526E;
    border-radius: 50%;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
    animation: bounce 2s ease-in-out infinite;
  }
  
  @keyframes bounce {
    0%, 100% {
      transform: translateY(0);
    }
    50% {
      transform: translateY(-30px);
    }
  }
  .about{
    font-family: "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif;
        font-weight: 700;
        color: #636e69;
        font-size: 50px;
  }
  .contactus{
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    flex-direction: row;
  }
  .row {
        width: 100% !important;
        height: 100% !important;
        text-align: center;
        padding: 10px;
      }
  label {
        font-size: 18px;
        color: #636e69;
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
      }

      input[type="submit"]:hover {
        background-color: #81526E;
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
  
  footer {
    background-color: #636e69;
    color: #fff;
    text-align: center;
    padding: 20px 0;
  }
   
 
    </style>
  </head>

  <body>
    <header style="width: 100%">
      <nav>
        <a href="#">
          <img src="img/logo.png" alt="LOGO" width="300 px" height="70 px"
        /></a>

        <br /><br />
        <ul>
        <li><a href="homebage3"style="margin-left: -900px;font-size: 10px;"><i class="fas fa-home" style="font-size: 24px;"></i>  Home page</a></li>
        <li><a href="profile.php"style="margin-left: 390px;">Profile</a></li>
        <li><a href="homebage3#Contact">Contact</a></li>
        <li><a href="homebage3#aboutus"style="margin-right: 400px;">About Us</a></li>
        <li><a href="cart.php"><i class="fas fa-shopping-cart"style="font-size: 24px;"></i>
       <li><a href="login.php"><i class="fas fa-sign-out-alt" style="font-size: 24px; margin-right: -900px;"></i></a></li>


        </ul>
      </nav>
    </header>
    <section>
      <div class="cont">
        <img
          src="img/cook.jpg"
          width="100%"
          height="600px"
          style="opacity: 0.5"
        />
        <h1 class="tit">
          "People who love<br />
          to eat are always<br />
          the best people."
        </h1>
       <div class="con2">
            <div class="con3">
                <div class="icon">  <button  type='button' class="bu2"onclick='test("1")' ><i class="fa-solid fa-drumstick-bite"></i></button></a></div>
                 <div class="con4"><h3>Main Course</h3>
                 <h5>Irresistible flavor </h5></div>
            </div>
             <div class="con3">
                <div class="icon">    <button  type='button'class="bu2"  onclick='test("2")'  ><i class="fa-solid fa-bowl-food"></i></button></a></div>
                 <div class="con4"><h3>Said Dishes</h3>
                 <h5>Delicious distinctiveness. </h5></div>
                  </div>
             <div class="con3">
                <div class="icon">   <button  type='button' class="bu2" onclick='test("3")'  ><i class="fa-solid fa-martini-glass-citrus"></i></button></a></div>
                 <div class="con4"><h3>Drinks</h3>
                 <h5>Sip the difference!</h5></div>
             </div>
             <div class="con3">
                <div class="icon">   <button  type='button' class="bu2" onclick='test("4")'  ><i class="fa-solid fa-cake-candles"></i></button></a></div>
                 <div class="con4"><h3>Desserts</h3>
                 <h5>Luxurious sweetness.</h5></div>
             </div>
             <div class="con3">
                <div class="icon">    <button  type='button' class="bu2" onclick='test("5")'  ><i class="fa-solid fa-bread-slice"></i></button></a></div>
                 <div class="con4"><h3>Fresh Bakery</h3>
                 <h5 >Fresh from our ovens to your plate!</h5></div>
             </div>
            </div>
 
    </section>
    <br><br><br><br><br><br>
    <section class="about" id="aboutus">
      <h1 class="about">About Us</h1><br>
        <div class="content">
          <h2>Welcome to Our Story</h2>
          <p>"At QuickBite, we're a team driven by passion, committed to curating the finest dining adventures just for you. With our dedicated crew, we handpick favorites, guaranteeing a winning taste in every order. Our goal is to provide excellent service and a comfortable, enjoyable food ordering experience for every visitor to our site.".</p>
          <img src="img/img4444447-.png">
      </section>
  
  <br><br> <br><br><br> <br><br><br> <br>

  
<section id="Contact">
 
  <h1 class="about">Contact</h1><br>
   <div class="contactus">
<div class="con3">
  <div class="icon"> <a href="#"><i class="fa-solid fa-phone"></i></a></div>
  <div class="con4"><h2>phone</h2>
  <h4>076483398</h4></div>
</div>
  <div class="con3">
    <div class="icon"> <a href="#"><i class="fa-solid fa-location-dot"></i></a></div>
    <div class="con4"><h2>Location</h2>
    <h4>Amman-Abdoun</h4></div></div>
    <div class="con3">
      <div class="icon"> <a href="#"><i class="fa-brands fa-facebook"></i></a></div>
      <div class="con4"><h2>facebook</h2>
      <h4>QuickBite</h4></div>
</div>


   </div>
   <br><br><br><br><br><br>
</section>
<h1 class="about">send message</h1>
<div class="container">
 
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
      <input type="submit" value="Send a message" />
    </form>
  </div>
</div>

<br><br><br>
    <footer >
   
      <p>&copy; 2023 Restaurant. All rights reserved.</p>
    </footer>
    <script>
    function test(itemtype) {
  window.location.href = 'fooditem.php?item=' + itemtype;
}
</script>  
 
  </body>
</html>



