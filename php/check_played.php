<?php
session_start();
$mysqli = new mysqli('localhost', 'root', '', 'student_data');
$stu_id = $_SESSION['student_id'];
$query = "SELECT * FROM `student_data` WHERE `student_id` = '$stu_id'";
$result = mysqli_query($mysqli,$query);
$num_row = mysqli_num_rows($result);
if($num_row>=1){
    echo 'false';
}
else{
    $mysqli->query("INSERT INTO student_data(`student_id`,`play_time`,`money_spend`,`buy_sequence`,`failed_time`) VALUES('$stu_id',-1,-1,'',-1)");
    echo "true";
}