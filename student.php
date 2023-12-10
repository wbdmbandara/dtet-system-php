<?php
session_start();
require_once("connection.php");
if(!isset($_SESSION['username'])){
  // header("Location:dashboard.php");
  header("Location:login.html");
}

if(isset($_POST['submit'])){
    $nic = $_POST['nic'];
    $name = $_POST['name'];

    $sql = 
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
</head>
<body>
    <a href="dashboard.php">Back to Dashboard</a>
    <form action="student.php" method="post">
        <label for="">NIC :</label>
        <input type="text" name="nic" id=""> <br>
        <label for="">Name :</label>
        <input type="text" name="name" id=""> <br>
        <input type="submit" name="submit" value="Save">
    </form>
</body>
</html>