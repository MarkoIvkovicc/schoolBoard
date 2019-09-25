<?php

$students = $app['database']->selectAll('student');
$grades = $app['database']->selectAll('subject');

require 'views/student.view.php';