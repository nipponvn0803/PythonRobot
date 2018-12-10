<?php
        include 'credit.php';
        $servername = "mysql.trinhson.com";
        $username = $user;
        $password = $passwd;
        $database = "trinhson_database";
        $source = "uploads/$name";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        //get from_date, add time as start day
        $id = $_REQUEST["id"];
        //get to_date, add time as end day
        $editTime = $_REQUEST["editTime"];
        $editName = $_REQUEST["editName"];
        $nextTD = $_REQUEST["nextTD"];
        //select records between two dates
        $sql = "UPDATE robot_record
        SET time = '{$editTIme}', photo_name= '{$editName}'
        WHERE id = '{$id}';";

        if (mysqli_query($conn, $sql)) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }

        mysqli_close($conn);
        rename($nextTD,$editName);
?>