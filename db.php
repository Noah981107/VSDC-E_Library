<?php 
    $conn = mysqli_connect("localhost", "root", "000000", "e_library");
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }