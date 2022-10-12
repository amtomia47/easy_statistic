<?php
    $mysqli = new mysqli('localhost','root','','student_data');
    if($mysqli->connect_error){
        die("error while connect : ".$mysqli->connect_error);
    }
    $id = $_POST["id"];
    $query = "SELECT * FROM `student_data` WHERE `student_id` = '$id'";
    $result = mysqli_query($mysqli,$query);
    $retur ="";
    $i = 0;
    while($stu_data = mysqli_fetch_array($result,MYSQLI_NUM)){
        $retur = $retur . '
        <h4>student ID: ' .$stu_data[0].'</h4> || 
        <h4>Money: '.$stu_data[2].'</h4><h3>$</h3> || 
        <h4>Time: '.$stu_data[1].'</h4><h3>s</h3>  
        <button class = "delete" onclick = "delete" id="'.$stu_data[0].'">刪除</button>                                  
        ';
        $i++;
    }
    echo $retur;