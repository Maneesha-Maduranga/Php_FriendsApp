<?php
    
    $servername = "localhost";
    $username = "Maneesha";
    $password = "123456";
    $dbName = "friendsapp";

    $conn = mysqli_connect($servername,$username,$password,$dbName);

    if(!$conn){
        echo "Connection Failed" . mysqli_connect_error();
    }


?>