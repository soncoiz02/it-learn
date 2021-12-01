<?php

// lấy thông tin 1 mã
function lesson_select_by_course($course_id)
{
    $sql = "SELECT * FROM lesson WHERE course_id=?";
    return pdo_query($sql, $course_id);
}

// Thêm mới

function lesson_insert($lesson_id, $course_id, $title, $doc_id, $video_id)
{
    $sql = "INSERT INTO lesson(lesson_id,course_id,title,doc_id,vid_id) VALUES(?,?,?,?,?)"; 
    // gọi lại hàm thực thi, tương tác dữ liệu
    pdo_execute($sql, $lesson_id, $course_id, $title, $doc_id, $video_id);
}

function lesson_count($id){
    $sql = 'SELECT count(*) from lesson where course_id=?';
    return pdo_query_value($sql, $id);
}

function video_count($id){
    $sql = 'SELECT count(lesson.link_video) from course join lesson on course.course_id = lesson.course_id where course.course_id=?';
    return pdo_query_value($sql, $id);
}

function quizz_count($id){
    $sql = "SELECT COUNT(*) from quiz JOIN lesson ON lesson.lesson_id = quiz.lesson_id WHERE lesson.course_id = ?";
    return pdo_query_value($sql, $id);
}

function lesson_delete($id){
    $sql = 'DELETE from lesson where lesson_id=?';
    pdo_execute($sql, $id);
}

function lesson_select_by_id($id){
    $sql = "SELECT * from lesson where lesson_id=?";
    return pdo_query_one($sql, $id);
}

function lesson_select_first($course_id){
    $sql = "SELECT * from lesson where course_id=? group by lesson_id limit 0, 1";
    return pdo_query_one($sql, $course_id);
}