<?php
    require_once '../../global.php';
    require '../../DAO/course.php';
    require '../../DAO/user.php';
    require '../../DAO/blog.php';
    extract($_REQUEST);
    function handle_date($today, $date){
        return round(abs(strtotime($today) - strtotime($date)) / (60*60*24),0);
    }
    
    $top10_courses = course_select_top10();
    $list_blog = blog_select_top10();

    $VIEW_NAME = 'home/home.php';
    require '../layout.php';
?>