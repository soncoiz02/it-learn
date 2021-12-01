<?php
    require_once 'pdo.php';
    function course_select_all(){
        $sql = 'SELECT * from course';
        return pdo_query($sql);
    }

    function course_select_by_id($id){
        $sql = 'SELECT * from course where course_id=?';
        return pdo_query_one($sql, $id);
    }

    function course_delete($id){
        $sql = 'DELETE from course where course_id=?';
        pdo_execute($sql, $id);
    }

    function course_insert( $course_name, $cate_id, $img, $dsc) {
        $sql = "INSERT into course(course_name, cate_id, course_img, course_dsc) value(?, ?, ?, ?)";
        pdo_execute($sql, $course_name, $cate_id, $img, $dsc);
    } 

    function course_update($course_id, $course_name, $cate_id, $img, $dsc) {
        $sql = 'UPDATE course set course_name=?, cate_id=?, course_img=?, course_dsc=? where course_id=?';
        pdo_execute($sql, $course_name, $cate_id, $img, $dsc, $course_id);
    }

    function video_select_all(){
        $sql = 'SELECT * from video';
        return pdo_query($sql);
    }
    function doc_select_all(){
        $sql = 'SELECT * from document';
        return pdo_query($sql);
    }

    function course_count($id){
        $sql = 'SELECT count(*) from course where course_id=?';
        return pdo_query_value($sql, $id);
    }

    function course_select_by_cate($cate_id){
        $sql = 'SELECT * from course where cate_id=?';
        return pdo_query($sql, $cate_id);
    }

    function course_count_user($course_id){
        $sql = 'SELECT count(username) from course_signed where course_id=?';
        return pdo_query_value($sql, $course_id);
    }

    function course_select_by_user($username){
        $sql = 'SELECT * from course join course_signed on course.course_id = course_signed.course_id where username=?';
        return pdo_query($sql, $username);
    }

    function course_select_top10(){
        $sql = "SELECT course.course_id, course.course_name, course.course_img FROM course JOIN course_signed ON course.course_id = course_signed.course_id GROUP BY course.course_id ORDER BY COUNT(username) DESC LIMIT 0, 10";
        return pdo_query($sql);
    }

    function video_select_by_id($id){
        $sql = 'SELECT * from video where vid_id=?';
        return pdo_query_one($sql, $id);
    }
    function doc_select_by_id($id){
        $sql = 'SELECT * from document where doc_id=?';
        return pdo_query_one($sql, $id);
    }

    function course_exist_user_signed($course_id, $username){
        $sql = "SELECT COUNT(*) FROM `course_signed` WHERE username = ? AND course_id = ?";
        return pdo_query_value($sql, $username, $course_id);
    }

    function course_sign($username, $course_id, $date){
        $sql = 'INSERT into course_signed(username, course_id, date_signed) values(?, ?, ?)';
        pdo_execute($sql, $username, $course_id, $date);
    }
?>