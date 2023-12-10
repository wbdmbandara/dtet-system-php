<?php
session_start();
require_once("connection.php");
if(!isset($_SESSION['username'])){
  // header("Location:dashboard.php");
  header("Location:login.html");
}
$msg = "";
if(isset($_POST['submit']) && $_POST['nic'] != "" && $_POST['name'] != "" ){
    $nic = $_POST['nic'];
    $name = $_POST['name'];

    // insert into student values ("200012000080", "Dilshan Madusanka");
    $sql = "insert into student values ('" . $nic . "', '" . $name . "')";
    $result = mysqli_query($conn, $sql);

    if(isset($result)){
        $msg = "Student Details inserted Successfully!";
    }else{
        $msg = "Student details insert failed!";
    }

}else{
   $msg = "Please fill below form"; 
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
    <?php echo $msg; ?> <br>
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