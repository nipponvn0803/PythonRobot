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
        function getName(){
            $id = $_GET['id'];
            $sql1 ="SELECT photo_name FROM robot_record WHERE id=$id";
            $name = $conn->query($sql1);
        }
        $id = $_GET['id'];
        $sql = "DELETE FROM robot_record WHERE id=$id";

        if(unlink($source)){
            echo "Success";
        }
        else{
            echo "Failed";
        }

        if (mysqli_query($conn, $sql)) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }

        mysqli_close($conn);
        
?>