<?php
    require_once '../../global.php';
    require '../../DAO/cate.php';
    require '../../DAO/question.php';
    require '../../DAO/blog.php';
    require '../../DAO/user.php';
    extract($_REQUEST);
    check_login();
    $today = date('Y-m-d');
    $day_ago = date("Y-m-d",strtotime ( '-7 day' , strtotime ( $today ) )) ;
    $list_cate = cate_select_all();
    $count_blog = count_blog_today($today);
    $count_question = count_question_today($today);
    $count_user = count_user_today($today);
    $total_user = count_total_user();
    $total_blog = count_total_blog();
    $total_question = count_total_question();
    $list_blog_data = [];
    $list_ques_data = [];
    foreach($list_cate as $key => $value){
        $blog_data = blog_count_by_cate($value['cate_name']);
        $ques_data = question_count_by_cate($value['cate_name']);
        array_push($list_blog_data, $blog_data);
        array_push($list_ques_data, $ques_data);
    }
    $VIEW_NAME = 'dashboard/manage.php';
    require '../layout.php';
?>