<?php
    require_once '../../global.php';
    if(exist_param("ask-list")){
        $VIEW_NAME = 'comment/ask.php';
    }
    else if(exist_param("ask-detail-list")){
        $VIEW_NAME = 'comment/ask-detail.php';
    }
    else if(exist_param("blog-list")){
        $VIEW_NAME = 'comment/blog.php';
    }
    else if(exist_param("course-list")){
        $VIEW_NAME = 'comment/course.php';
    }
    require '../layout.php';
?>