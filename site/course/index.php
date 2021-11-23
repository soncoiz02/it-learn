<?php
    require_once '../../global.php';
    require '../../DAO/course.php';    
    extract($_REQUEST);
    if(exist_param('btn-list')){
        $courses_front = course_select_all();
        $VIEW_NAME = 'course/course.php';
    }
    require '../layout.php';
?>