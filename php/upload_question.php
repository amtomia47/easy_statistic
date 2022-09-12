<?php
    echo 'test';
    $mysqli = new mysqli('localhost','root','','student_data');
    if($mysqli->connect_error){
        die();
    }

    $n = [0,0,0,0,0,0,0,0,0];
    $n[0] = $_POST["q0"];
    $n[1] = $_POST["q1"];
    $n[2] = $_POST["q2"];
    $n[3] = $_POST["q3"];
    $n[4] = $_POST["q4"];
    $n[5] = $_POST["q5"];
    $n[6] = $_POST["q6"];
    $n[7] = $_POST["q7"];
    $n[8] = $_POST["q8"];



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

    $new_a = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
    $new_a = a_ready($new_a,$n);

    function b_table_ready($a){
        $b = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
        for($i =0;$i<15;$i++){
            $b[$i] = round($a[$i]/$a[15]*10000)/100;
        }
        return $b;
    }
    $new_b = b_table_ready($new_a);

    function c_table_ready($a){
        $c = [0,0,0,0,0,0,0,0,0];
        for($i = 1;$i<=3;$i++){
            for($j = 1 ;$j<=3;$j++){
                $c[($i-1)*3+$j-1] = round($a[($i-1)*4+$j-1]/$a[$i*4-1]*10000)/100;
    
            }
        }
        return $c;
    }
    $new_c = c_table_ready($new_a);

    function d_table_ready($a){
        $d = [0,0,0,0,0,0,0,0,0];
        for($i =1;$i<=3;$i++){
            for($j = 1;$j<=3;$j++){
                $d[($i-1)*3+$j-1] = round($a[($i-1)*4+$j-1]/$a[12+$j-1]*10000)/100;
            }
        }
        return $d;
    }
    $new_d = d_table_ready($new_a);



    $mysqli->query("DELETE FROM `a`");
    $mysqli->query("DELETE FROM `b`");
    $mysqli->query("DELETE FROM `c`");
    $mysqli->query("DELETE FROM `d`");

    $mysqli->query("INSERT INTO `a`(`a`,`b`,`c`,`d`,`e`,`f`,`g`,`h`,`i`) VALUES($n[0],$n[1],$n[2],$n[3],$n[4],$n[5],$n[6],$n[7],$n[8])");
    $mysqli->query("INSERT INTO `b`(`a`,`b`,`c`,`d`,`e`,`f`,`g`,`h`,`i`,`j`,`k`,`l`,`m`,`n`,`o`) VALUES($new_b[0],$new_b[1],$new_b[2],$new_b[3],$new_b[4],$new_b[5],$new_b[6],$new_b[7],$new_b[8],$new_b[9],$new_b[10],$new_b[11],$new_b[12],$new_b[13],$new_b[14])");
    $mysqli->query("INSERT INTO `c`(`a`,`b`,`c`,`d`,`e`,`f`,`g`,`h`,`i`) VALUES($new_c[0],$new_c[1],$new_c[2],$new_c[3],$new_c[4],$new_c[5],$new_c[6],$new_c[7],$new_c[8])");
    $mysqli->query("INSERT INTO `d`(`a`,`b`,`c`,`d`,`e`,`f`,`g`,`h`,`i`) VALUES($new_d[0],$new_d[1],$new_d[2],$new_d[3],$new_d[4],$new_d[5],$new_d[6],$new_d[7],$new_d[8])");

    