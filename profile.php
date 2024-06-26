<?php
// Database connection configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quickbite";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user data  based on the user's session 
session_start();
if (!isset($_SESSION['id'])) {
    // Redirect to the login page if the user is not authenticated
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['id'];
$query = "SELECT * FROM customer WHERE CUS_ID = $user_id";
$result = mysqli_query($conn, $query);
if (!$result) {
    die("Error in SQL query: " . mysqli_error($conn));
}

$userData = mysqli_fetch_assoc($result);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission and update the database (validate, sanitize, and secure input)
    $newPhone = mysqli_real_escape_string($conn, $_POST['PHONE']);
    $newAddress = mysqli_real_escape_string($conn, $_POST['ADDRESS']);
    $newEmail = mysqli_real_escape_string($conn, $_POST['EMAIL']);
    
    
    // Check if a new password is provided
    if (!empty($_POST['new_password'])) {
        $newPassword = mysqli_real_escape_string($conn, $_POST['new_password']); // Get the plain text password
        
        // Update the user's password in the database without hashing
        $updatePasswordQuery = "UPDATE customer SET PASSWORD = '$newPassword' WHERE CUS_ID = $user_id";
        $updatePasswordResult = mysqli_query($conn, $updatePasswordQuery);
        if (!$updatePasswordResult) {
            die("Error in updating password: " . mysqli_error($conn));
        }
    }
    
    // Redirect back to the profile page
    header("Location: profile.php");
    exit();
}

// Close the database connection
mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylehome.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <title>User Profile</title>
    <style>
      .div{
        font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    background-color:#b1b6b4 ;
    margin: 0;
    padding: 10px;
    
}


h1 {
    text-align: center;
    margin-top: 20px;
}


form {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}


label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    color:#636e69;
}

input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

input[type="file"] {
    margin-top: 5px;
}


input[type="submit"] {
    background-color: #6e6368;
    color: #fff;
    border: none;
    border-radius: 3px;
    padding: 10px 20px;
    cursor: pointer;
    margin-left: 140px;
}

input[type="submit"]:hover {
    background-color: #C6C09C;
}


br {
    clear: both;
}


h1 {
    color: #fff;
}


body {
    padding-top: 20px;
}
.center-container {
  display: flex;
  justify-content: center;
  align-items: center;
  
}

.red-button {
  width: 400px;
  padding: 10px 20px; 
  margin-top:5px;
  background-color: #6e6368;
  color: white;
  text-decoration: none;
  border: none;
  border-radius: 5px; 
  text-align:center;
}
header {
    background-color: #636e69;
    text-align: center;
    padding: 20px 0;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }

  
 header h1 {
    margin: 0;
    font-size: 48px;
    color: #fff;
  }
  
  nav ul {
    list-style: none;
    padding: 0;
    margin:0;
    margin-left:400px;
  }
  
  nav ul li {
    display: inline;
    margin-right: 20px;
  }
  
  nav ul li a {
    text-decoration: none;
    color: #fff;
    font-weight: bold;
    transition: color 0.3s ease-in-out;
  }
  
  nav ul li a:hover {
    color: #b1b6b4;
  }
 </style>

</head>
<body>

   <div> <header style="width: 100%">
   

<nav>
  <li><a href="#" > <img src="img/logo.png" alt ="LOGO" width="300 px" height="70 px"></a></li>
  <br>
  <ul>
  <li><a href="homebage3"style="margin-left: -700px;font-size: 18px;">Home</a></li>
  <li><a href="profile.php"style="margin-left: 50px;">Profile</a></li>
  <li><a href="homebage3#Contact">Contact</a></li>
  <li><a href="homebage3#aboutus" style="margin-right: 350px;">About Us</a></li>
  <li><a href="login.php" style="border: 1px solid #d0d3d2; padding: 10px;font-size: 12px; color:#c0c5c3;">Logout</a></li>



  </ul>
</nav>

</header></div>

   
<div class="div">


    <h1>User Profile</h1>
    <form method="POST" enctype="multipart/form-data">
        <label for="USERNAME">Username:</label>
        <input type="text" id="USERNAME" name="USERNAME" value="<?php echo $userData['USERNAME']; ?>" readonly>
        <br>

        <label for="PHONE">Phone:</label>
        <input type="text" id="PHONE" name="PHONE" value="<?php echo $userData['PHONE']; ?>">
        <br>

        <label for="ADDRESS">Address:</label>
        <input type="text" id="ADDRESS" name="ADDRESS" value="<?php echo $userData['ADDRESS']; ?>">
        <br>
        <label for="EMAIL">Email:</label>
        <input type="text" id="EMAIL" name="EMAIL" value="<?php echo $userData['EMAIL']; ?>">
        <br>
        <div>
        <label for="PASSWORD">Password:</label>
<input type="PASSWORD" id="PASSWORD" name="PASSWORD" value="<?php echo $userData['PASSWORD']; ?>" readonly>
<span id="togglePassword" style="cursor: pointer;">Show</span>
</div>
<br>

        <div>
            <label for="new_password">New Password:</label>
            <input type="PASSWORD" id="new_password" name="new_password">
        </div>
        <br>

        

        <input type="submit" value="Save">

    </form>
    

<div class="center-container">
  <a href="logout.php" id="logout" class="red-button">Logout</a>
</div></div>
<script>
    // JavaScript to toggle password visibility
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('PASSWORD');
    
    // Set the initial state to show the password
    passwordInput.type = 'text';
    togglePassword.textContent = 'Hide';
    
    togglePassword.addEventListener('click', function () {
        if (passwordInput.type === 'PASSWORD') {
            passwordInput.type = 'text';
            togglePassword.textContent = 'Hide';
        } else {
            passwordInput.type = 'PASSSWORD';
            togglePassword.textContent = 'Show';
        }
    });
</script>
</body>
</html>
