<?php
    $mysqli = new mysqli('localhost','root','','student_data');
    $mysqli->query("DELETE FROM `student_data`");