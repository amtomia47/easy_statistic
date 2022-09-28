<?php
    $mysqli = new mysqli('localhost','root','','student_data');
    $mysqli->query("UPDATE `student_count` SET `count` = 0");    
    $mysqli->query("DELETE FROM `student_data`");