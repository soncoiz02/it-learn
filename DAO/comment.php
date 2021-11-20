<?php
    require_once 'pdo.php';
    function comment_course_select_all(){
        $sql = 'SELECT * from binh_luan';
        return pdo_query($sql);
    }
    function comment_blog_select_all(){
        $sql = 'SELECT * from binh_luan';
        return pdo_query($sql);
    }
    function comment_question_select_all(){
        $sql = 'SELECT * from binh_luan';
        return pdo_query($sql);
    }


    function comment_course_delete($id){
        $sql = 'DELETE from binh_luan where ma_bl=?';
        pdo_execute($sql, $id);
    }
    function comment_blog_delete($id){
        $sql = 'DELETE from binh_luan where ma_bl=?';
        pdo_execute($sql, $id);
    }
    function comment_question_delete($id){
        $sql = 'DELETE from binh_luan where ma_bl=?';
        pdo_execute($sql, $id);
    }

    function binh_luan_insert($ma_kh, $ma_hh, $noi_dung, $ngay_bl) {
        $sql = "INSERT into binh_luan(noi_dung, ma_hh, ma_kh, ngay_bl) value(?, ?, ?, ?)";
        pdo_execute($sql, $noi_dung, $ma_hh, $ma_kh, $ngay_bl);
    } 

    function binh_luan_select_by_hang_hoa($id) {
        $sql = "SELECT * from binh_luan where ma_hh=?";
        return pdo_query($sql, $id);
    }
?>