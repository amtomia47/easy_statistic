<?php
    session_start();
    $mysqli = new mysqli('localhost', 'root', '', 'student_data');
    if(isset($_SESSION['student_id'])){
        $stu_id = $_SESSION['student_id'];
        $time =$_POST["time"];
        $money =$_POST['money'];
        $seq = $_POST['seq'];
        $fail = $_POST["failed_time"];
    }
    $mysqli->query("DELETE FROM student_data WHERE `student_data`.`student_id` = '".$stu_id."'");
    $mysqli->query("INSERT INTO student_data(`student_id`,`play_time`,`money_spend`,`buy_sequence`,`failed_time`) VALUES('$stu_id',$time,$money,'$seq',-1)");