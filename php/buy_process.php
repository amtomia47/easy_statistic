<?php

    $myspli = new mysqli('localhost','root','','student_data');
    if($myspli->connect_error){
        die("error:(".$myspli->connect_errno.")" . $myspli->connect_error);
    }
    function a_ready($aA,$tA){ 
        for($i =1;$i<=3;$i++){
            (int)$aA[$i*4-1] = (int)$tA[$i*3-1] + (int)$tA[$i*3-2] + (int)$tA[$i*3-3];
            (int)$aA[$i+12-1] = (int)$tA[$i-1] + (int)$tA[$i+3-1] + (int)$tA[$i+6-1];
        }
        $aA[15] = $aA[3]+$aA[7]+$aA[11];
        for($i = 0,$j=0;$i<9;$i++){
            $aA[$i+$j] = (int)$tA[$i];
            if(($i+1)%3==0){
                $j++;
            }
        }
        return $aA;
    }

    $target_id = $_POST["target_id"];
    $query = "SELECT * FROM `". strtolower($target_id[0]) ."`";
    $result = mysqli_query($myspli,$query);
    $target_arr = mysqli_fetch_array($result,MYSQLI_NUM);
    if($target_id[0]=='A'){
        $aA = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
        $target_arr= a_ready($aA,$target_arr);
    }
    $row;
    if($target_id[0]=='A'||$target_id[0]=='B'){
        $row =(intval($target_id[2])-1)*4;
    }
    else{
        $row =(intval($target_id[2])-1)*3;
    }
    $retur = $target_arr[$row+intval($target_id[4])-1];
    if($target_id[0]!='A') $retur = $retur . "%";
    echo $retur;