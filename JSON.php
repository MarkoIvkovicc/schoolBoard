<?php

$dblink = new mysqli("localhost", "root", "", "schoolboarddb");

if ($dblink->connect_errno) {
    printf("Failed to connect to database");
    exit();
}

$result = $dblink->query("select student.id, student.firstName, student.lastName, student.board from student left outer join subject on student.id=subject.id_student where board = 'CSM'");
$sum = $dblink->query("SELECT id_student, `oop`, `web_programming`, `back_end_programming`, `front_end_programming` FROM SUBJECT");

$dbdata = array();

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