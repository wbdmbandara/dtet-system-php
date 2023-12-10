<?php
require_once("connection.php");
session_start();
if(!isset($_SESSION['username'])){
  // header("Location:dashboard.php");
  header("Location:login.html");
}


if(isset($_POST['submit'])){
    $nic = $_POST['nic'];

    $query = "select * from student s, certificate c where s.nic = '" . $nic . "' and c.nic = '" . $nic . "'" ;
    
    $student = ""; 
    $stName = "";
    $count = 0;
    $searchForm = '<h1>Student Details</h1>
    <form action="search-student.php" method="post">
      <label for="nic">Student NIC</label>
      <input type="text" name="nic" id="nic" value ="' . $nic . '" />
      <input type="submit" name="submit" value="Search" /><br>    
    </form>';

    $action = "";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) >= 1){
        while($row = mysqli_fetch_assoc($result)){
            $count += 1;
            $nic = $row['nic'];
            // $certificate = $row['certificate'];
            $serial = $row['serial'];
            // $type = $row['type'];
            $dateReceived = $row['dateReceived'];
            $status = $row['status'];
            $stName = $row['name'];

            if($status == "Issued"){
                $action = "Issued";
            }else if($status == "Received"){
                $action = "<a href='update-certificate.php?serial=".$serial."'>Update Certificate </a> ";
            }

            $student .= "<tr> <td>" . $count . "</td>";
            $student .= "<td>" . $nic . "</td>";
            $student .= "<td>" . $stName . "</td>";
            $student .= "<td>" . $serial . "</td>";
            $student .= "<td>" . $dateReceived . "</td>";
            $student .= "<td>" . $action . "</td>";
            $student .= "<td><a href='delete-certificate.php?serial=".$serial."'>Delete</a></td> </tr>";


        }

    $table = '<table>
      <tr>
        <th>SN</th>
        <th>NIC</th>
        <th>Name</th>
        <th>Serial</th>
        <th>Date Received</th>
        <th>Action</th>
        <th>Delete</th>
      </tr>                
    ';

    $nameSection = '<label for="stname">Student Name</label>
      <input type="text" name="stname" id="stname" disabled value="' . $stName . '">';
        echo $searchForm;
        echo $nameSection;
        echo $table;
        echo $student;
    }else{
        echo "Invalid NIC NO.";
        echo $searchForm;
    }


}else{
    header("Location:search-student.html");
}


?>