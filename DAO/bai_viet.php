<?php

function bai_viet_selectall()
{
    $sql = "SELECT * FROM bai_viet ORDER BY ma_bai_viet	 DESC";
    return pdo_query($sql);
}

// lấy thông tin 1 mã
function bai_viet_getinfo($ma_bai_viet)
{
    $sql = "SELECT * FROM bai_viet WHERE ma_bai_viet=?";
    return pdo_query_one($sql, $ma_bai_viet);
}

// Thêm mới

function bai_viet_insert($ma_nguoi_dung, $tieu_de, $noi_dung, $anh_dai_dien, $ngay_viet_bai, $ma_danh_muc)
{
    $sql = "INSERT INTO bai_viet(ma_nguoi_dung,tieu_de,noi_dung,anh_dai_dien,ngay_viet_bai,ma_danh_muc) VALUES(?,?,?,?,?,?)"; 
    // gọi lại hàm thực thi, tương tác dữ liệu
    pdo_execute($sql, $ma_nguoi_dung, $tieu_de, $noi_dung, $anh_dai_dien, $ngay_viet_bai, $ma_danh_muc);
}
// sx theo người viết
function bai_viet_select_by_nguoi_dung($ma_nguoi_dung)
{
    $sql = "SELECT * FROM bai_viet WHERE ma_nguoi_dung = ?";
    return  pdo_query($sql, $ma_nguoi_dung);
}
// sx theo danh mục
function bai_viet_select_by_danh_muc($ma_danh_muc)
{
    $sql = "SELECT * FROM bai_viet WHERE ma_danh_muc = ?";
    return  pdo_query($sql, $ma_danh_muc);
}
// // hiển thị top 10;
// function bai_viet_top10()
// {
//     $sql = "SELECT * FROM bai_viet WHERE so_luot_xem > 0 ORDER BY so_luot_xem DESC LIMIT 0,10";
//     return pdo_query($sql);
// }
// // phân trang
// function phan_trang()
// {
//     $sp_tung_trang = 9;
//     if (!isset($_GET['page'])) {
//         $trang = 1;
//     } else {
//         $trang = $_GET['page'];
//     }
//     $tung_trang =  ($trang - 1) * $sp_tung_trang;
//     $sql = "SELECT * FROM bai_viet  ORDER BY ma_bai_viet  DESC LIMIT $tung_trang,$sp_tung_trang";
//     return pdo_query($sql);
// }
//
// tìm hàng đặc biệt
// function khoa_dac_biet()
// {
//     $sql = "SELECT * FROM bai_viet WHERE dac_biet = 1";
//     return pdo_query($sql);
// }

// xóa 
function bai_viet_delete($ma_bai_viet)
{
    $sql = "DELETE FROM bai_viet WHERE ma_bai_viet=?";
    pdo_execute($sql, $ma_bai_viet);
}
// // hiển thị theo keywords
// function bai_viet_select_by_keyword($keyword)
// {
//     $sql = "SELECT * FROM bai_viet a INNER JOIN  khoa_hoc b ON b.ma_nguoi_dung = a.ma_nguoi_dung 
//     WHERE ten_bai_viet LIKE ? OR ten_khoa_hoc LIKE ? ";
//     return pdo_query($sql, '%' . $keyword . '%', '%' . $keyword . '%');
// }
// update 
function update_hh($ma_nguoi_dung, $tieu_de, $noi_dung, $anh_dai_dien, $ngay_viet_bai, $ma_danh_muc, $ma_bai_viet)
{
    $sql = "UPDATE bai_viet 
    SET ma_nguoi_dung=?,tieu_de=?,noi_dung=?,anh_dai_dien=?,ngay_viet_bai=?,ma_danh_muc=? WHERE ma_bai_viet=?";
    pdo_execute($sql, $ma_nguoi_dung, $tieu_de, $noi_dung, $anh_dai_dien, $ngay_viet_bai, $ma_danh_muc, $ma_bai_viet);
}
// // số lượt lượt xem
// function bai_viet_so_luot_luot_xem($ma_bai_viet)
// {
//     $sql = "UPDATE bai_viet SET so_luot_xem = so_luot_xem + 1 WHERE ma_bai_viet = ? ";
//     pdo_execute($sql, $ma_bai_viet);
// }
// // đếm số lượng hàng hóa
// function product_count()
// {
//     $sql = "SELECT COUNT(*) as total  FROM bai_viet WHERE ma_bai_viet";
//     return pdo_query($sql);
// }
