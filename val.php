<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

if (isset($_POST['form_type'])) {
    $formType = $_POST['form_type'];

    if ($formType === 'form1') {

$Username = $_POST['username'];
$Password = $_POST['password'];
$Address = $_POST['address'];
$Phone = $_POST['phone'];
$Email=$_POST['email'];
function test_input($data)
{
	$data=trim($data);
	$data=stripslashes($data);
	$data=htmlspecialchars($data);
	return $data;
}

$Username=test_input($_POST['username']);
$Password=test_input($_POST['password']);
$Address=test_input($_POST['address']);
$Phone=test_input($_POST['phone']);
$Email=test_input($_POST['email']);
//insert info into the database
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
$sql = "INSERT INTO customer (USERNAME , PASSWORD , ADDRESS , PHONE ,EMAIL)
VALUES ('$Username', '$Password' ,'$Address' , '$Phone','$Email')";
if ($conn->query($sql) === TRUE) {
    header("location: login.php?source=creat");
    exit();

  //OPEN HOME PAGE WITH ALART *****
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
	}


    /////log in
	elseif ($formType === 'form2') {
		$Username = $_POST['username'];
$Password = $_POST['password'];

function test_input($data)
{
	$data=trim($data);
	$data=stripslashes($data);
	$data=htmlspecialchars($data);
	return $data;
}
$Username=test_input($_POST['username']);
$Password=test_input($_POST['password']);
//database
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

//action
if ($Username == "admin" && $Password=="0000") {
    header("Location: admin.php");
    exit();
}else{
    /////////////
$sql = mysqli_query($conn,"SELECT * FROM customer WHERE USERNAME='"
    . $_POST["username"] . "' AND
    PASSWORD='" . $_POST["password"] . "'    ");

    //add this as test

    $_SESSION['username']=$Username;

   $idQuery = mysqli_query($conn,
    "SELECT CUS_ID FROM customer WHERE USERNAME='"
    . $_POST["username"] . "' AND
    PASSWORD='" . $_POST["password"] . "'    ");

if ($idQuery) {
    $row = mysqli_fetch_assoc($idQuery);
    $_SESSION['id'] = $row['CUS_ID'];

}
    //end

    $num = mysqli_num_rows($sql);
   
    if($num > 0) {
        $row = mysqli_fetch_array($sql);
        header("location:homebage3.php");
        exit();
    }
    else {
        header("location: login.php?source=notlogin");
        exit();

	}}
$conn->close();

    }}
?>
