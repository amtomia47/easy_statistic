<?php
    session_start();
    $mysqli = new mysqli('localhost', 'root', '', 'student_data');
    $num = $_POST["num"];
    mysqli_query($mysqli,"UPDATE `accept_num` SET `num` = ".(int)$num);
