<?php
    require_once 'pdo.php';
    function user_select_all(){
        $sql = 'SELECT * from hang_hoa';
        return pdo_query($sql);
    }

    function user_select_by_id($id){
        $sql = 'SELECT * from hang_hoa where ma_hh=?';
        return pdo_query_one($sql, $id);
    }

    function user_delete($id){
        $sql = 'DELETE from hang_hoa where ma_hh=?';
        $sql1 = 'DELETE from binh_luan where ma_hh=?';
        pdo_execute($sql1, $id);
        pdo_execute($sql, $id);
    }

    function user_insert($ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet, $ngay_nhap, $so_luot_xem, $mo_ta, $han_sd) {
        $sql = "INSERT into hang_hoa(ten_hh, don_gia, giam_gia, hinh, ngay_nhap, dac_biet, so_luot_xem, mo_ta, ma_loai, han_sd) value(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        pdo_execute($sql, $ten_hh, $don_gia, $giam_gia, $hinh, $ngay_nhap, $dac_biet, $so_luot_xem, $mo_ta, $ma_loai, $han_sd);
    } 

    function user_update($ma_hh, $ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet, $ngay_nhap, $luot_xem, $mo_ta) {
        $sql = 'UPDATE hang_hoa set ten_hh=?, don_gia=?, giam_gia=?, hinh=?, ngay_nhap=?, dac_biet=?, so_luot_xem=?, mo_ta=?, ma_loai=? where ma_hh=?';
        pdo_execute($sql, $ten_hh, $don_gia, $giam_gia, $hinh, $ngay_nhap, $dac_biet, $luot_xem, $mo_ta, $ma_loai, $ma_hh);
    }

    function hang_select_top10() {
        $sql = 'SELECT top 10 * from hang_hoa';
        return pdo_query($sql);    
    }

    function hang_select_page($page_num, $limit) {
        $start = $page_num * $limit;
        $sql = "SELECT * from hang_hoa limit $start, 5";
        return pdo_query($sql);
    }

    function hang_count() {
        $sql = 'SELECT count(*) from hang_hoa';
        return pdo_query_value($sql);
    }

    function hang_select_by_loai($id) {
        $sql = 'SELECT * from hang_hoa where ma_loai=?';
        return pdo_query($sql, $id);
    }
?>