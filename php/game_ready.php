<?php
    session_start();

    $mysqli = new mysqli('localhost','root','','student_data');
    if($mysqli->connect_error){
        die("error :(". $mysqli->connect_errno.")" . $mysqli->connect_error);
    }
    $ans_arr = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
    for($i=0;$i<16;$i++){
        $v = 'a' . $i+1;
        $t = $_POST[$v];
        $ans_arr[$i] = (int) $t;
    }
    if(isset($_SESSION['student_id'])){
        $stu_id = $_SESSION['student_id'];
        $time =$_POST["time"];
        $money =$_POST['money'];
        $seq = $_POST['seq'];
    }
    $qA = "SELECT * FROM `a`";
    $qB = "SELECT * FROM `b`";
    $qC = "SELECT * FROM `c`";
    $qD = "SELECT * FROM `d`";
    $rA = mysqli_query($mysqli,$qA);
    $rB = mysqli_query($mysqli,$qB);
    $rC = mysqli_query($mysqli,$qC);
    $rD = mysqli_query($mysqli,$qD);
    $tA = mysqli_fetch_row($rA);
    $tB = mysqli_fetch_row($rB);
    $tC = mysqli_fetch_row($rC);
    $tD = mysqli_fetch_row($rD);
    $aA = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
    function a_ready($aA,$tA){ 
        for($i =1;$i<=3;$i++){
            (int)$aA[$i*4-1] = (int)$tA[$i*3-1] + (int)$tA[$i*3-2] + (int)$tA[$i*3-3];
            (int)$aA[$i+12-1] = (int)$tA[$i-1] + (int)$tA[$i+3-1] + (int)$tA[$i+6-1];
        }
        (int)$aA[15] = (int)$aA[3]+(int)$aA[7]+(int)$aA[11];
        for($i = 0,$j=0;$i<9;$i++){
            $aA[$i+$j] = (int)$tA[$i];
            if(($i+1)%3==0){
                $j++;
            }
        }
        return $aA;
    }
    $aA = a_ready($aA,$tA);
    $passed = true;
    for($i=0;$i<16;$i++){
        if($aA[$i] != (int)$ans_arr[$i]){
            $passed = false;
            break;
        }
    }
    if($passed){
        $mysqli->query("INSERT INTO student_data(`student_id`,`play_time`,`money_spend`,`buy_sequence`) VALUES('$stu_id',$time,$money,'$seq')");
        echo 'true';
    }
    else{
        echo 'false';
    }