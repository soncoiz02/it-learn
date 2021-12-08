<?php
    require_once '../../global.php';
    require '../../DAO/question.php';
    require '../../DAO/cate.php';
    require '../../DAO/user.php';
    require '../../DAO/comment.php';
     
    extract($_REQUEST);

    function handle_date($today, $date){
        return round(abs(strtotime($today) - strtotime($date)) / (60*60*24),0);
    }

    if(exist_param("list-ques")){
        $list_ques = question_select_all();
        $VIEW_NAME = 'ask/ask.php';
    }
    else if(exist_param("my-ask")){
        $user = $_SESSION['user'];
        extract($user);
        $list_question = question_select_by_user($username);
        $VIEW_NAME = 'ask/myask.php';
    }
    else if(exist_param("detail-ques")){
        $detail_ques = question_select_by_id($ques_id);
        extract($detail_ques);
        $number_ques = question_count_by_comment($ques_id);
        $list_comment = comment_question_select_by_id($ques_id);
        $VIEW_NAME = 'ask/detail.php';
    }
    else if(exist_param('btn-insert')){
        extract($_SESSION['user']);
        if(isset($tag)){
            $tag_string = implode(', ',$tag);
        }
        else $tag_string = '';
        $date = date("Y-m-d");
        try {
            question_insert($username, $tag_string, $content, $date);
            $list_question = question_select_by_user($username);
            $list_tag = cate_select_all();
        } catch (Exception $exc) {
        }
        $VIEW_NAME = 'ask/myask.php';
    }
    else if(exist_param('btn-send-cmt')){
        extract($_SESSION['user']);
        $today = date('Y-m-d');
        try {
            comment_question_insert($username, $ques_id, $comment, $today);
            $detail_ques = question_select_by_id($ques_id);
            extract($detail_ques);
            $number_ques = question_count_by_comment($ques_id);
            $list_comment = comment_question_select_by_id($ques_id);
        } catch (Exception $exc) {
        }
        $VIEW_NAME = 'ask/detail.php';
    }
    if(exist_param("btn-delete")){
        try {
            question_delete($ques_id);
            $user = $_SESSION['user'];
            extract($user);
            $list_question = question_select_by_user($username);
            $MESSAGE = 'Xóa thành công';
            $type = 'success';
        } catch (PDOException $th) {
            $MESSAGE = 'Xóa thất bại';
            $type = 'fail';
        }
        $VIEW_NAME = 'ask/myask.php';
    }
    require '../layout.php';
?>