<?php
session_start();
if(!isset($_SESSION['username'])){
  // header("Location:dashboard.php");
  header("Location:login.html");
}
require_once("connection.php");

if(isset($_GET['serial'])){
    $serial = $_GET['serial'];
    $sql = "delete from certificate where serial = '".$serial."';";
    $result = mysqli_query($conn, $sql);

    if(isset($result)){
        header("Location:search-student.html");
    }

}else{
    header("Location:search-student.html");
}




?>