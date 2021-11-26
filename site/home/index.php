<?php
    require_once '../../global.php';
    require '../../DAO/course.php';
    require '../../DAO/user.php';

    $top10_courses = course_select_top10();

    $VIEW_NAME = 'home/home.php';
    require '../layout.php';
?>