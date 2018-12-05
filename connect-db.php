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
?>