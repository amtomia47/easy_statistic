<?php
    $mysqli = new mysqli('localhost','root','','student_data');
    if($mysqli->connect_error){
        echo 'error';
        die();
    }

    $query = "SELECT * FROM `student_data`";
    $result = mysqli_query($mysqli,$query);
    $retur = "";
    while($stu_data = mysqli_fetch_array($result,MYSQLI_NUM)){
        $retur = $retur . '<li>
        <h4>student ID: ' .$stu_data[0].'</h4> || 
        <h4>Money: '.$stu_data[2].'</h4><h3>$</h3> || 
        <h4>Time: '.$stu_data[1].'</h4><h3>s</h3>  
        <button class = "delete" id="' .$stu_data[0]. '">刪除</button>                                  
        </li></br>';
    }
    echo $retur;