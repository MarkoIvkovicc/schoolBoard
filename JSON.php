<?php

//Create database connection and Initialize variable for database credentials
$dblink = new mysqli("localhost", "root", "", "schoolboarddb");

//Check connection was successful
if ($dblink->connect_errno) {
    printf("Failed to connect to database");
    exit();
}

//Fetch rows from table
$result = $dblink->query("select student.id, student.firstName, student.lastName, student.board from student left outer join subject on student.id=subject.id_student where board = 'CSM'");
$sum = $dblink->query("SELECT id_student, `oop`, `web_programming`, `back_end_programming`, `front_end_programming` FROM SUBJECT");

//Initialize array variable
$dbdata = array();

//Fetch into associative array
while ( $row = $result->fetch_assoc())  {
    $dbdata[]=$row;
}

$summary = array();
while ( $roww = $sum->fetch_assoc()) {
    $summary[]=$roww;
}

$fp = fopen('studentsCSM.json', 'w');
fwrite($fp, json_encode($dbdata));
fclose($fp);

$avgjson = fopen('avgGrades.json', 'w');
fwrite($avgjson, json_encode($summary));
fclose($avgjson);
?>