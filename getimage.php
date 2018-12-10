<?php
$servername = "mysql.trinhson.com";
$username = "caoson";
$password = "hikzDFBB";
$dbname = "trinhson_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, time, photo_name FROM robot_record";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $file_encode = rawurlencode($row['photo_name']);
        echo "id: " . $row["id"]. " - time: " . $row["time"]. '<a href="' . $file_encode . '">' . $row['photo_name'] . '</a>';
        echo "<br/>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
