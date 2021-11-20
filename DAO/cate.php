<?php
    require_once 'pdo.php';
    function cate_select_all(){
        $sql = 'SELECT * from cate';
        return pdo_query($sql);
    }

    function cate_select_by_id($id){
        $sql = 'SELECT * from cate where cate_id=?';
        return pdo_query_one($sql, $id);
    }

    function cate_delete($id){
        $sql = 'DELETE from cate where cate_id=?';
        pdo_execute($sql, $id);
    }

    function cate_insert($cate_name) {
        $sql = "INSERT into cate(cate_name) value(?)";
        pdo_execute($sql, $cate_name);
    } 

    function cate_update($cate_id, $cate_name) {
        $sql = 'UPDATE cate set cate_name=? where cate_id=?';
        pdo_execute($sql, $cate_name, $cate_id);
    }

?>