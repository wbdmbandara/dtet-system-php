<?php
require_once("connection.php");

if(isset($_POST['submit'])){
    $nic = $_POST['nic'];

    $query = "select * from student s, certificate c where s.nic = '" . $nic . "' and c.nic = '" . $nic . "'" ;
    
    $student = ""; 
    $stName = "";
    $count = 0;
    $searchForm = '<h1>Welcome DTET</h1>
    <form action="search.php" method="post">
      <label for="nic">Student NIC</label>
      <input type="text" name="nic" id="nic" value ="' . $nic . '" />
      <input type="submit" name="submit" value="Search" /><br>    
    </form>';

    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) >= 1){
        while($row = mysqli_fetch_assoc($result)){
            $count += 1;
            $nic = $row['nic'];
            $certificate = $row['certificate'];
            $serial = $row['serial'];
            $type = $row['type'];
            $dateReceived = $row['dateReceived'];
            $status = $row['status'];
            $stName = $row['name'];

            $student .= "<tr> <td>" . $count . "</td>";
            $student .= "<td>" . $certificate . "</td>";
            $student .= "<td>" . $type . "</td>";
            $student .= "<td>" . $serial . "</td>";
            $student .= "<td>" . $dateReceived . "</td>";
            $student .= "<td>" . $status . "</td> </tr>";


        }

    $table = '<table>
      <tr>
        <th>SN</th>
        <th>Certificate</th>
        <th>Type</th>
        <th>Serial</th>
        <th>Date Received</th>
        <th>Status</th>
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
    header("Location:index.html?error");
}


?>