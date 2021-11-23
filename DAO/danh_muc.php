<?php
// truy vấn ds danh mục đã nhập
// mới lên trước
function danh_muc_selectall()
{
    $sql = "select * from danh_muc order by ma_danh_muc DESC";
    return pdo_query($sql);
}
// thêm mới
function danh_muc_insert($ten_danh_muc)
{
    $sql = "INSERT INTO danh_muc(ten_danh_muc) VALUES (?)";
    pdo_execute($sql, $ten_danh_muc);
}
// xóa
function danh_muc_delete($ma_danh_muc)
{
    $sql = "DELETE FROM danh_muc WHERE ma_danh_muc=?";
    pdo_execute($sql, $ma_danh_muc);
}
// lấy thông tin 1 mã 
function danh_muc_getinfo($ma_danh_muc)
{
    $sql = "select * from danh_muc where ma_danh_muc=?";
    return pdo_query_one($sql, $ma_danh_muc);
}
// cập nhật dữ liệu
function danh_muc_update($ten_danh_muc, $ma_danh_muc)
{
    $sql = "UPDATE danh_muc SET ten_danh_muc=? WHERE ma_danh_muc=?";
    pdo_execute($sql, $ten_danh_muc, $ma_danh_muc);
}
