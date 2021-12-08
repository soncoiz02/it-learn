<?php

function quiz_selectall()
{
    $sql = "SELECT * FROM quiz ORDER BY quiz_id DESC";
    return pdo_query($sql);
}

function quiz_select_by_page($page_num){
    $start = $page_num * 10;
    $sql = "SELECT * from quiz limit $start, 10";
    return pdo_query($sql);
}

// lấy thông tin 1 mã
function quiz_getinfo($ma_quiz)
{
    $sql = "SELECT * FROM quiz WHERE ma_quiz=?";
    return pdo_query_one($sql, $ma_quiz);
}

// Thêm mới

function quiz_insert($quiz_id, $lesson_id, $question, $as_1, $as_2, $as_3, $as_correct)
{
    $sql = "INSERT INTO quiz(quiz_id,lesson_id,question,answer_1,answer_2,answer_3,correct_answer) VALUES(?,?,?,?,?,?,?)"; 
    pdo_execute($sql,$quiz_id, $lesson_id, $question, $as_1, $as_2, $as_3, $as_correct);
}

function quiz_update($quiz_id, $question, $as1, $as2, $as3, $as4){
    $sql = 'UPDATE quiz set question=?, answer_1=?, answer_2=?, answer_3=?, correct_answer=? where quiz_id=?';
    pdo_execute($sql, $question, $as1, $as2, $as3, $as4, $quiz_id);
}

function quiz_select_by_lesson($lesson_id)
{
    $sql = "SELECT * FROM quiz WHERE lesson_id = ?";
    return  pdo_query($sql, $lesson_id);
}

function quiz_select_by_id($id){
    $sql = 'SELECT * from quiz where quiz_id=?';
    return pdo_query_one($sql, $id);
}

function quiz_delete($ma_quiz)
{
    $sql = "DELETE FROM quiz WHERE quiz_id=?";
    pdo_execute($sql, $ma_quiz);
}

function update_hh($ma_bai_hoc, $cau_hoi, $dap_an_1, $dap_an_2, $dap_an_3, $dap_an_dung, $ma_quiz)
{
    $sql = "UPDATE quiz 
    SET ma_bai_hoc=?,cau_hoi=?,dap_an_1=?,dap_an_2=?,dap_an_3=?,dap_an_dung=? WHERE ma_quiz=?";
    pdo_execute($sql, $ma_bai_hoc, $cau_hoi, $dap_an_1, $dap_an_2, $dap_an_3, $dap_an_dung, $ma_quiz);
}

function marks_insert($username, $quiz_id, $poin){
    $sql = 'INSERT into marks(username, quiz_id, poin) values(?,?,?)';
    pdo_execute($sql, $username, $quiz_id, $poin);
}

function select_user_poin($username, $quiz_id){
    $sql = 'SELECT * from marks where username=? and quiz_id=?';
    return pdo_query_one($sql, $username, $quiz_id);
}