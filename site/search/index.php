<?php
    require_once '../../global.php';
    require '../../DAO/course.php';
    require '../../DAO/blog.php';
    require '../../DAO/question.php';
    require '../../DAO/user.php';
    require '../../DAO/cate.php';
    extract($_REQUEST);
    function handle_date($today, $date){
        return round(abs(strtotime($today) - strtotime($date)) / (60*60*24),0);
    }
    $today = date("Y-m-d");
    $list_blog = blog_search($search_key);
    $list_course = course_search($search_key);
    $list_ques = question_search($search_key);

    $VIEW_NAME = 'search/list.php';

    require '../layout.php';
?>