<?php
    require_once '../../global.php';
    require '../../DAO/course.php';
    require '../../DAO/cate.php';

    extract($_REQUEST);
    if(exist_param("btn-list")){
        $list_course = course_select_all();
        $VIEW_NAME = "course/list.php";
    }
    else if(exist_param("btn-add")){
        $VIEW_NAME = "course/add.php";
    }
    else if(exist_param("btn-lesson")){
        $list_course = course_select_all();
        $VIEW_NAME = "course/lesson.php";
    }
    else if(exist_param("btn-add-lesson")){
        $list_video = video_select_all();
        $detail = course_select_by_id($course_id);
        extract($detail);
        $VIEW_NAME = "course/addlesson.php";
    }
    require '../layout.php';
?>