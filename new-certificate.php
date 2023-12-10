<?php
session_start();
if(!isset($_SESSION['username'])){
  // header("Location:dashboard.php");
  header("Location:login.html");
}
require_once("connection.php");

if(isset($_POST['submit'])){
    $certificate = $_POST['certificate'];
    $nic = $_POST['nic'];
    $name = $_POST['name'];
    $certificateNo = $_POST['certificateNo'];
    $date = $_POST['recDate'];

    $sql1 = "insert into student values ('".$nic."', '".$name."');";
    $sql2 = "insert into certificate (serial, nic, certificate, dateReceived, status) values ('".$certificateNo."','".$nic."', '".$certificate."', '". $date ."', 'Received');";

    $result = mysqli_query($conn, $sql1);
    $result = mysqli_query($conn, $sql2);
    if(isset($result)){
        header("Location:dashboard.php?certificate-added");
    }

}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Certificate</title>
</head>
<body>
    <form action="new-certificate.php" method="post">
        <label for="">Certificate Name :</label>
        <select name="certificate" required id="">
            <option value="Graphic Design NVQ Level 4">Graphic Design NVQ Level 4</option>
            <option value="ICT NVQ Level 4">ICT NVQ Level 4</option>
            <option value="ICT NVQ Level 5">ICT NVQ Level 5</option>
        </select>
        <br>
        <label for="">Student NIC :</label>
        <input type="text" required name="nic" id=""><br>
        <label for="">Name : </label>
        <input type="text" name="name" required id=""><br>
        <label for="">Certificate NO: </label>
        <input type="text" name="certificateNo" required id=""><br>
        <label for="">Date Received :</label>
        <input type="text" name="recDate" required id=""><br>
        <input type="submit" value="Add" name="submit">

    </form>
</body>
</html>