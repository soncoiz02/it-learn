<?php
    require_once '../../global.php';
    require '../../DAO/question.php';
    require '../../DAO/cate.php';
    require '../../DAO/user.php';
    extract($_REQUEST);
    function handle_date($today, $date){
        return round(abs(strtotime($today) - strtotime($date)) / (60*60*24),0);
    }
    if(exist_param("list-ques")){
        $list_ques = question_select_all();
        $list_tag = cate_select_all();
        $VIEW_NAME = 'ask/ask.php';
    }
    else if(exist_param("my-ask")){
        $user = $_SESSION['user'];
        extract($user);
        $list_question = question_select_by_user($username);
        $list_tag = cate_select_all();
        $VIEW_NAME = 'ask/myask.php';
    }
    else if(exist_param("detail-ques")){
        $VIEW_NAME = 'ask/detail.php';
    }
    else if(exist_param('btn-insert')){
        extract($_SESSION['user']);
        $tag_string = implode($tag);
        $date = date("Y-m-d");
        try {
            question_insert($username, $tag_string, $content, $date);
            $list_question = question_select_by_user($username);
            $list_tag = cate_select_all();
        } catch (Exception $exc) {
        }
        $VIEW_NAME = 'ask/myask.php';
    }
    require '../layout.php';
?>