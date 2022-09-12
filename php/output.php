<?php
    $mysqli = new mysqli('localhost','root','','student_data');
    if($mysqli->connect_error){
        die("erroe: " . $mysqli->connect_error);
    }
    $f = fopen("成績結算.csv","wt");
    $query = "SELECT * FROM `student_data`";
    $result = $mysqli->query($query);
    $t =true;
    while($row = $result->fetch_assoc()){
        if($t){
            fputcsv($f,array_keys($row));
            $t=false;
        }
        fputcsv($f,$row);
    }
    echo "processed~";