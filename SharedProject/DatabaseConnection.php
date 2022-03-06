<?php

    function dbConnection()
    {
        $servername = "localhost";
        $dbname = "clubs";
        $username = "user";
        $password = "pass";

        $conn = new mysqli($servername, $username, $password, $dbname) or die("Connection failed %s\n" . $conn -> error);
        

        return $conn;
    }
    
    function endConnection($conn)
    {
        $conn -> close();
    }
?>