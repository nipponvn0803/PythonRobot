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
$query = $_REQUEST["q"];
$sql = "SELECT *
FROM robot_record WHERE time LIKE '{$query}%'";

$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Time</th><th>Name</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $file_encode = rawurlencode($row['photo_name']);
        echo "<tr><td>".$row["id"]."</td><td>".$row["time"]."</td><td>". " " .'<a href="' . $file_encode . '">'.$row["photo_name"].'</a>'. " " ."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$mysqli->close();
?>
