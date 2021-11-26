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

    function blog_delete($id){
        $sql = 'DELETE from blog where blog_id=?';
        pdo_execute($sql, $id);
    }

    function blog_insert( $title, $username, $content, $avt, $cate_id) {
        $sql = "INSERT into blog(title, username, content, avatar, cate_id) value(?, ?, ?, ?, ?)";
        pdo_execute($sql, $title, $username, $content, $avt, $cate_id);
    } 

    function blog_select_comment($blog_id){
        $sql = 'SELECT * from blog_comment where blog_id=?';
        return pdo_query($sql, $blog_id);
    }

?>