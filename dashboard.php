<?php
session_start();
if(!isset($_SESSION['username'])){
  // header("Location:dashboard.php");
  header("Location:login.html");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard - DTET</title>
  </head>
  <body>
    <a href="student.php">Student</a><br>
    <a href="search-student.html">Search Student</a><br>
    <a href="new-certificate.php">New Certificate</a><br>
    <a href="delete-certificate.php">Delete Certificate</a><br>
  </body>
</html>
