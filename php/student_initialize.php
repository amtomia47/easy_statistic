<?php
    session_start();
    $mysqli = new mysqli('localhost', 'root', '', 'student_data');
    if($mysqli->connect_errno){
        echo $mysqli->connect_error;
        die("error->(" . $mysqli->connect_errno.")" . $mysqli->connect_error);
    }
    $stu_id = mysqli_real_escape_string($mysqli,$_POST["student_id"]);
    if($stu_id == '123456'){
        echo 'teacher';
        die();
    }
    $query = "SELECT * FROM `student_data` WHERE `student_id` = '$stu_id'";
    $result = mysqli_query($mysqli,$query);
    $num_row = mysqli_num_rows($result);

    if($num_row>=1){
        echo 'false';
    }
    else{
        $_SESSION["student_id"] = $stu_id;
        echo 'true';
    }