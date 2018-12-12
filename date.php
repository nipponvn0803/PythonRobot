<?php
include 'credit.php';
$servername = "mysql.trinhson.com";
$username = $user;
$password = $passwd;
$database = "trinhson_database";
$mysqli = new mysqli($servername, $username, $password, $database);
if($mysqli->connect_error) {
  exit('Could not connect');
}
//get from_date, add time as start day
$from_date = $_REQUEST["from_date"] . " 00:00:00";
//get to_date, add time as end day
$to_date = $_REQUEST["to_date"] . " 23:59:59";
//select records between two dates
$sql = "SELECT *
FROM robot_record WHERE time BETWEEN '{$from_date}' AND '{$to_date}'";

$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
    echo "<table class='table table-striped table-hover custom-table'><tr><th>ID</th><th>Time</th><th>Name</th><th>Action</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //add event listener with id as parameter, add link to photos
        $file_encode = rawurlencode($row['photo_name']);
        $order = '<td class="delete" onclick="deleteID('. $row["id"] . ')">';
        echo "<tr id='{$row["id"]}'><td>".$row["id"]."</td>
        <td>".$row["time"]."</td>
        <td>". " " .'<a href="' . $file_encode . '">'.$row["photo_name"].'</a>'. " " ."</td>" 
         . $order . "Delete</td>

        </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$mysqli->close();
?>
