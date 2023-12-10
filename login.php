<?php
session_start();
require_once("connection.php");
if((isset($_POST['username'])) && (isset($_POST['password']))){

    $userName = $_POST['username'];
    $password = $_POST['password'];
    $shaPassword = sha1($password);

    $sql = "select * from user where username = '" . $userName . "' and password = '" . $shaPassword . "'";

    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) == 1){
        $_SESSION['username'] = $userName;
        header("Location:dashboard.php");
    }else{
        header("Location:login.html?error");
    }

}else{
    header("Location:login.html?error");
}

?>