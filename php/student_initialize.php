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
        $passed = false;
        $groupe = array("#01","#02","#03","#04","#05","#06","#07","#08","#09","#10","#11","#12","#13","#14","#15","#16","#17","#18","#19","#20","#21","#22","#23","#24","#25","#26","#27","#28","#29","#30","#31","#32","#33","#34","#35","#36","#37","#38","#39","#40","#41","#42","#43","#44","#45","#46","#47","#48","#49","#50","#51","#52","#53","#54","#55","#56","#57","#58","#59","#60");
        $S_num = mysqli_query($mysqli,"SELECT * FROM `accept_num`");
        $n = mysqli_fetch_row($S_num);
        $num = (int)$n[0];
        for($i=0;$i<$num;$i++){
            if($stu_id == $groupe[$i]){
                $passed = true;
                break;
            }
        }
        if($passed){
            $_SESSION["student_id"] = $stu_id;
            
            echo 'true';            
        }
        else{
            echo 'out';
        }
    }