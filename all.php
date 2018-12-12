<?php
// create connectio nwith database
include 'credit.php';
$servername = "mysql.trinhson.com";
$username = $user;
$password = $passwd;
$database = "trinhson_database";
$mysqli = new mysqli($servername, $username, $password, $database);
if($mysqli->connect_error) {
  exit('Could not connect');
}

// Get all records in table
$sql = "SELECT *
FROM robot_record";

$result = $mysqli->query($sql);
//if there is mor than 0 results
if ($result->num_rows > 0) {
    echo "<table class='table table-striped table-hover custom-table'><tr><th>ID</th><th>Time</th><th>Name</th><th>Action</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //encode file name into url
        $file_encode = rawurlencode($row['photo_name']);
        //add event listener with id as parameter, add link to photos
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
