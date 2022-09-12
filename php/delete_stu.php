<?php
    $mysqli = new mysqli('localhost','root','','student_data');
    if($mysqli->connect_error){
        die("error:".$mysqli->connect_error);
    }
    $name = $_POST["name"];
    $query = "DELETE FROM `student_data` WHERE `student_id` = '$name'";
    $result = $mysqli->query($query);
    echo $name;