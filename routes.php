<?php

$router->define([
    '' => 'controllers/index.php',
    'students?id=' . $_GET['id'] => 'controllers/student.php'
]);
