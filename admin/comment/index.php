<?php
    require_once '../../global.php';
    require '../../DAO/comment.php';
    require '../../DAO/user.php';
    require '../../DAO/question.php';
    require '../../DAO/blog.php';

    extract($_REQUEST);

    if(exist_param("ask-list")){
        $list_comment_question = question_select_all();
        $VIEW_NAME = 'comment/ask.php';
    }
    else if(exist_param("detail-ask")){
        $list_comment = comment_question_select_by_id($ques_id);
        $detail_ques = question_select_by_id($ques_id);
        $VIEW_NAME = 'comment/ask-detail.php';
    }
    else if(exist_param("blog-list")){
        $list_comment_blog = blog_select_all();
        $VIEW_NAME = 'comment/blog.php';
    }
    else if(exist_param("course-list")){
        $list_comment_lesson = comment_lesson_select_all();
        $VIEW_NAME = 'comment/course.php';
    }
    require '../layout.php';
?>