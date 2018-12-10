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
        

        $id = $_GET['id'];
        $sql1 = "SELECT * FROM robot_record WHERE id=$id";
        $result1 = $conn->query($sql1);
        $value = $result1->fetch_assoc();
        $name = $value['photo_name'];
        unlink($name);

        $sql2 = "DELETE FROM robot_record WHERE id=$id";
        $result2 = $conn->query($sql2);

        $sql3 = "SELECT * FROM robot_record";
        $result3 = $conn->query($sql3);
        if ($result3->num_rows > 0) {
            echo "<table class='table table-striped table-hover custom-table'><tr><th>ID</th><th>Time</th><th>Name</th><th>Action</th></tr>";
            // output data of each row
            while($row = $result3->fetch_assoc()) {
                $file_encode = rawurlencode($row['photo_name']);
                $order = '<td onclick="deleteID('. $row["id"] . ')">';
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