<?php
    require_once 'pdo.php';
    function comment_lesson_select_by_lesson($lesson_id){
        $sql = 'SELECT * from course_comment where lesson_id=?';
        return pdo_query($sql, $lesson_id);
    }
    function comment_blog_select_by_id($id){
        $sql = 'SELECT * from blog_comment where blog_id=?';
        return pdo_query($sql, $id);
    }
    function comment_question_select_all(){
        $sql = 'SELECT * from question_comment';
        return pdo_query($sql);
    }
    function comment_question_insert($username, $ques_id, $content, $date){
        $sql = 'INSERT into question_comment(username, ques_id, content, date) values(?,?,?,?)';
        pdo_execute($sql, $username, $ques_id, $content, $date);
    }

    function comment_blog_insert($username, $blog_id, $content, $date){
        $sql = 'INSERT into blog_comment(username, blog_id, content, date) values(?,?,?, ?)';
        pdo_execute($sql, $username, $blog_id, $content, $date);
    }

    function comment_question_select_by_id($ques_id){
        $sql = 'SELECT * from question_comment where ques_id=?';
        return pdo_query($sql, $ques_id);
    }

    function comment_lesson_insert($username, $lesson_id, $content, $date){
        $sql = "INSERT into course_comment(username, lesson_id, content, date) values(?, ?, ?, ?)";
        pdo_execute($sql, $username, $lesson_id, $content, $date);
    }

    function comment_lesson_select_all(){
        $sql = 'SELECT course.course_name, lesson.title, lesson.lesson_id, COUNT(course_comment.id) as total  FROM course JOIN lesson ON course.course_id = lesson.course_id JOIN course_comment ON lesson.lesson_id = course_comment.lesson_id GROUP BY lesson.lesson_id HAVING COUNT(course_comment.id) > 0';
        return pdo_query($sql);
    }

    function comment_blog_delete($id){
        $sql = 'DELETE from blog_comment where id=?';
        pdo_execute($sql, $id);
    }
    function comment_question_delete($id){
        $sql = 'DELETE from question_comment where id=?';
        pdo_execute($sql, $id);
    }
    function comment_course_delete($id){
        $sql = 'DELETE from course_comment where id=?';
        pdo_execute($sql, $id);
    }

?>