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
        $sql = "INSERT into course(course_name, cate_id, image, description) value(?, ?, ?, ?)";
        pdo_execute($sql, $course_name, $cate_id, $img, $dsc);
    } 

    function course_update($course_id, $course_name, $cate_id, $img, $dsc) {
        $sql = 'UPDATE course set course_name=?, cate_id=?, image=?, description=? where course_id=?';
        pdo_execute($sql, $course_name, $cate_id, $img, $dsc, $course_id);
    }
?>