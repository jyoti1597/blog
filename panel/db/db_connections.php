<?php

    $localhost = "localhost";
    $username = "root";
    $password = "";
    $dbname = "newsblog";

    $conn = mysqli_connect($localhost, $username, $password, $dbname);

   if(!$conn){
     die("Cloud  not connect to the database");
   }

   
?>