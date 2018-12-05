<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Python Robot</h1>
        <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#news">News</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href=""><i class="material-icons">notifications</i></a></li>
            <li style="float:right"><a href="#about">About</a></li>
        </ul>
        <?php
        include 'credit.php';
        $servername = "mysql.trinhson.com";
        $username = $user;
        $password = $passwd;
        $database = "trinhson_database";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM robot_record";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<table><tr><th>ID</th><th>Time</th><th>Name</th></tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $file_encode = rawurlencode($row['photo_name']);
                echo "<tr><td>".$row["id"]."</td>
                <td>".$row["time"]."</td>
                <td>". " " .'<a href="' . $file_encode . '">'.$row["photo_name"].'</a>'. " " ."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>

    </div>



</body>
</html>
