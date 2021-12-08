<?php
    require_once '../../global.php';
    require '../../DAO/user.php';
    require '../../DAO/question.php';

    extract($_REQUEST);
    check_login();
    if(exist_param("list-ques")){
        $list_ques = question_select_all();
        $VIEW_NAME = 'question/list.php';
    }
    else if(exist_param("delete-ques")){
        try {
            question_delete($ques_id);
            $list_ques = question_select_all();
        } catch (PDOException $th) {
            //throw $th;
        }
        $VIEW_NAME = 'question/list.php';
    }
    require '../layout.php';
?>