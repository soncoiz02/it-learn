<?php
    require_once '../../global.php';
    require '../../DAO/course.php';
    require '../../DAO/user.php';
    require '../../DAO/blog.php';

    $top10_courses = course_select_top10();
    $list_blog = blog_select_all();

    $VIEW_NAME = 'home/home.php';
    require '../layout.php';
?>