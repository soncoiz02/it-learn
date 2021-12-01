<?php
    require_once 'pdo.php';
    function blog_select_all(){
        $sql = 'SELECT * from blog';
        return pdo_query($sql);
    }

    function blog_select_by_id($id){
        $sql = 'SELECT * from blog where blog_id=?';
        return pdo_query_one($sql, $id);
    }

    function blog_select_by_user($username){
        $sql = 'SELECT * from blog where username=?';
        return pdo_query($sql, $username);
    }

    function blog_delete($id){
        $sql1 = 'DELETE from blog_comment where blog_id=?';
        $sql2 = 'DELETE from blog where blog_id=?';
        pdo_execute($sql1, $id);
        pdo_execute($sql2, $id);
    }

    function blog_insert( $title, $username, $content, $avt, $cate_id, $date) {
        $sql = "INSERT into blog(title, username, content, avatar, cate_id, date) value(?, ?, ?, ?, ?, ?)";
        pdo_execute($sql, $title, $username, $content, $avt, $cate_id, $date);
    } 

    function blog_select_comment($blog_id){
        $sql = 'SELECT * from blog_comment where blog_id=?';
        return pdo_query($sql, $blog_id);
    }

    function blog_count_comment($blog_id){
        $sql = 'SELECT count(*) from blog_comment where blog_id=?';
        return pdo_query_value($sql, $blog_id);
    }

?>