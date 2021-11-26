<?php
    require_once 'pdo.php';
    function question_select_all(){
        $sql = 'SELECT * from question order by ques_id desc';
        return pdo_query($sql);
    }

    function question_select_by_id($id){
        $sql = 'SELECT * from question where ques_id=?';
        return pdo_query_one($sql, $id);
    }

    function question_delete($id){
        $sql = 'DELETE from hang_hoa where ma_hh=?';
        pdo_execute($sql, $id);
    }

    function question_insert($username, $tag, $content, $date) {
        $sql = "INSERT into question(username, tag, content, date_ask) value(?, ?, ?, ?)";
        pdo_execute($sql, $username, $tag, $content, $date);
    } 

    function question_select_by_user($username){
        $sql = "SELECT * from question where username=?";
        return pdo_query($sql, $username);
    }

    function question_count_by_comment($ques_id){
        $sql = "SELECT count(*) from question_comment where ques_id=?";
        return pdo_query_value($sql, $ques_id);
    }
?>