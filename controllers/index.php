<?php

$students = $app['database']->selectAll('student');

require 'views/index.view.php';