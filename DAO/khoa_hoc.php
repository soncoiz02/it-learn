<?php

function khoa_hoc_selectall()
{
    $sql = "SELECT * FROM khoa_hoc ORDER BY ma_khoa_hoc	 DESC";
    return pdo_query($sql);
}

// lấy thông tin 1 mã
function khoa_hoc_getinfo($ma_khoa_hoc)
{
    $sql = "SELECT * FROM khoa_hoc WHERE ma_khoa_hoc=?";
    return pdo_query_one($sql, $ma_khoa_hoc);
}

// Thêm mới

function khoa_hoc_insert($ten_khoa_hoc, $ma_danh_muc, $anh_dai_dien, $mo_ta, $ma_lo_trinh)
{
    $sql = "INSERT INTO khoa_hoc(ten_khoa_hoc,ma_danh_muc,anh_dai_dien,mo_ta,ma_lo_trinh) VALUES(?,?,?,?,?)"; 
    // gọi lại hàm thực thi, tương tác dữ liệu
    pdo_execute($sql, $ten_khoa_hoc, $ma_danh_muc, $anh_dai_dien, $mo_ta, $ma_lo_trinh);
}
// hàng hóa theo danh mục
function khoa_hoc_select_by_danh_muc($ma_danh_muc)
{
    $sql = "SELECT * FROM khoa_hoc WHERE ma_danh_muc = ?";
    return  pdo_query($sql, $ma_danh_muc);
}
// // hiển thị top 10;
// function khoa_hoc_top10()
// {
//     $sql = "SELECT * FROM khoa_hoc WHERE so_luot_xem > 0 ORDER BY so_luot_xem DESC LIMIT 0,10";
//     return pdo_query($sql);
// }
// phân trang
function phan_trang()
{
    $sp_tung_trang = 9;
    if (!isset($_GET['page'])) {
        $trang = 1;
    } else {
        $trang = $_GET['page'];
    }
    $tung_trang =  ($trang - 1) * $sp_tung_trang;
    $sql = "SELECT * FROM khoa_hoc  ORDER BY ma_khoa_hoc  DESC LIMIT $tung_trang,$sp_tung_trang";
    return pdo_query($sql);
}
//
// tìm hàng đặc biệt
// function khoa_dac_biet()
// {
//     $sql = "SELECT * FROM khoa_hoc WHERE dac_biet = 1";
//     return pdo_query($sql);
// }

// xóa 
function khoa_hoc_delete($ma_khoa_hoc)
{
    $sql = "DELETE FROM khoa_hoc WHERE ma_khoa_hoc=?";
    pdo_execute($sql, $ma_khoa_hoc);
}
// hiển thị theo keywords
function khoa_hoc_select_by_keyword($keyword)
{
    $sql = "SELECT * FROM khoa_hoc a INNER JOIN  danh_muc b ON b.ma_danh_muc = a.ma_danh_muc 
    WHERE ten_khoa_hoc LIKE ? OR ten_danh_muc LIKE ? ";
    return pdo_query($sql, '%' . $keyword . '%', '%' . $keyword . '%');
}
// update 
function update_hh($ten_khoa_hoc, $ma_danh_muc, $anh_dai_dien, $mo_ta, $ma_lo_trinh, $ma_khoa_hoc)
{
    $sql = "UPDATE khoa_hoc 
    SET ten_khoa_hoc=?,ma_danh_muc=?,anh_dai_dien=?,mo_ta=?,ma_lo_trinh=? WHERE ma_khoa_hoc=?";
    pdo_execute($sql, $ten_khoa_hoc, $ma_danh_muc, $anh_dai_dien, $mo_ta, $ma_lo_trinh, $ma_khoa_hoc);
}
// // số lượt lượt xem
// function khoa_hoc_so_luot_luot_xem($ma_khoa_hoc)
// {
//     $sql = "UPDATE khoa_hoc SET so_luot_xem = so_luot_xem + 1 WHERE ma_khoa_hoc = ? ";
//     pdo_execute($sql, $ma_khoa_hoc);
// }
// // đếm số lượng hàng hóa
// function product_count()
// {
//     $sql = "SELECT COUNT(*) as total  FROM khoa_hoc WHERE ma_khoa_hoc";
//     return pdo_query($sql);
// }
