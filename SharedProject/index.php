<?php
    include 'DatabaseConnection.php';

    $conn = dbConnection();
    
    echo "Connected Successfully";
    
    endConnection($conn);
?>