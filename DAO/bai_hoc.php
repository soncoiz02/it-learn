<?php

function bai_hoc_selectall()
{
    $sql = "SELECT * FROM bai_hoc ORDER BY ma_bai_hoc	 DESC";
    return pdo_query($sql);
}

// lấy thông tin 1 mã
function bai_hoc_getinfo($ma_bai_hoc)
{
    $sql = "SELECT * FROM bai_hoc WHERE ma_bai_hoc=?";
    return pdo_query_one($sql, $ma_bai_hoc);
}

// Thêm mới

function bai_hoc_insert($ma_khoa_hoc, $tieu_de, $noi_dung, $link_video, $tai_lieu)
{
    $sql = "INSERT INTO bai_hoc(ma_khoa_hoc,tieu_de,noi_dung,link_video,tai_lieu) VALUES(?,?,?,?,?)"; 
    // gọi lại hàm thực thi, tương tác dữ liệu
    pdo_execute($sql, $ma_khoa_hoc, $tieu_de, $noi_dung, $link_video, $tai_lieu);
}
// sx theo khóa học 
function bai_hoc_select_by_khoa_hoc($ma_khoa_hoc)
{
    $sql = "SELECT * FROM bai_hoc WHERE ma_khoa_hoc = ?";
    return  pdo_query($sql, $ma_khoa_hoc);
}
// // hiển thị top 10;
// function bai_hoc_top10()
// {
//     $sql = "SELECT * FROM bai_hoc WHERE so_luot_xem > 0 ORDER BY so_luot_xem DESC LIMIT 0,10";
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
//     $sql = "SELECT * FROM bai_hoc  ORDER BY ma_bai_hoc  DESC LIMIT $tung_trang,$sp_tung_trang";
//     return pdo_query($sql);
// }
//
// tìm hàng đặc biệt
// function khoa_dac_biet()
// {
//     $sql = "SELECT * FROM bai_hoc WHERE dac_biet = 1";
//     return pdo_query($sql);
// }

// xóa 
function bai_hoc_delete($ma_bai_hoc)
{
    $sql = "DELETE FROM bai_hoc WHERE ma_bai_hoc=?";
    pdo_execute($sql, $ma_bai_hoc);
}
// hiển thị theo keywords
function bai_hoc_select_by_keyword($keyword)
{
    $sql = "SELECT * FROM bai_hoc a INNER JOIN  khoa_hoc b ON b.ma_khoa_hoc = a.ma_khoa_hoc 
    WHERE ten_bai_hoc LIKE ? OR ten_khoa_hoc LIKE ? ";
    return pdo_query($sql, '%' . $keyword . '%', '%' . $keyword . '%');
}
// update 
function update_hh($ma_khoa_hoc, $tieu_de, $noi_dung, $link_video, $tai_lieu, $ma_bai_hoc)
{
    $sql = "UPDATE bai_hoc 
    SET ma_khoa_hoc=?,tieu_de=?,noi_dung=?,link_video=?,tai_lieu=? WHERE ma_bai_hoc=?";
    pdo_execute($sql, $ma_khoa_hoc, $tieu_de, $noi_dung, $link_video, $tai_lieu, $ma_bai_hoc);
}
// // số lượt lượt xem
// function bai_hoc_so_luot_luot_xem($ma_bai_hoc)
// {
//     $sql = "UPDATE bai_hoc SET so_luot_xem = so_luot_xem + 1 WHERE ma_bai_hoc = ? ";
//     pdo_execute($sql, $ma_bai_hoc);
// }
// // đếm số lượng hàng hóa
// function product_count()
// {
//     $sql = "SELECT COUNT(*) as total  FROM bai_hoc WHERE ma_bai_hoc";
//     return pdo_query($sql);
// }
