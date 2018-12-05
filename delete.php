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
        $sql ="SELECT photo_name FROM robot_record WHERE id=$id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $name = $row['photo_name'];
        
        if(unlink($name)){
            echo "Success";
        }
        else{
            echo "Failed";
        }
        $id = $_GET['id'];
        $sql1 = "DELETE FROM robot_record WHERE id=$id";
        if (mysqli_query($conn, $sql1)) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }


        mysqli_close($conn);
        header("Location:index.php");
?>