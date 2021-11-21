<?php

function cau_hoi_selectall()
{
    $sql = "SELECT * FROM cau_hoi ORDER BY ma_cau_hoi	 DESC";
    return pdo_query($sql);
}

// lấy thông tin 1 mã
function cau_hoi_getinfo($ma_cau_hoi)
{
    $sql = "SELECT * FROM cau_hoi WHERE ma_cau_hoi=?";
    return pdo_query_one($sql, $ma_cau_hoi);
}

// Thêm mới

function cau_hoi_insert($ma_nguoi_dung, $tieu_de, $noi_dung)
{
    $sql = "INSERT INTO cau_hoi(ma_nguoi_dung,tieu_de,noi_dung) VALUES(?,?,?)"; 
    // gọi lại hàm thực thi, tương tác dữ liệu
    pdo_execute($sql, $ma_nguoi_dung, $tieu_de, $noi_dung);
}
// sx theo người viết
function cau_hoi_select_by_nguoi_dung($ma_nguoi_dung)
{
    $sql = "SELECT * FROM cau_hoi WHERE ma_nguoi_dung = ?";
    return  pdo_query($sql, $ma_nguoi_dung);
}
// sx theo danh mục
// function cau_hoi_select_by_danh_muc($ma_danh_muc)
// {
//     $sql = "SELECT * FROM cau_hoi WHERE ma_danh_muc = ?";
//     return  pdo_query($sql, $ma_danh_muc);
// }
// // hiển thị top 10;
// function cau_hoi_top10()
// {
//     $sql = "SELECT * FROM cau_hoi WHERE so_luot_xem > 0 ORDER BY so_luot_xem DESC LIMIT 0,10";
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
//     $sql = "SELECT * FROM cau_hoi  ORDER BY ma_cau_hoi  DESC LIMIT $tung_trang,$sp_tung_trang";
//     return pdo_query($sql);
// }
//
// tìm hàng đặc biệt
// function khoa_dac_biet()
// {
//     $sql = "SELECT * FROM cau_hoi WHERE dac_biet = 1";
//     return pdo_query($sql);
// }

// xóa 
function cau_hoi_delete($ma_cau_hoi)
{
    $sql = "DELETE FROM cau_hoi WHERE ma_cau_hoi=?";
    pdo_execute($sql, $ma_cau_hoi);
}
// // hiển thị theo keywords
// function cau_hoi_select_by_keyword($keyword)
// {
//     $sql = "SELECT * FROM cau_hoi a INNER JOIN  khoa_hoc b ON b.ma_nguoi_dung = a.ma_nguoi_dung 
//     WHERE ten_cau_hoi LIKE ? OR ten_khoa_hoc LIKE ? ";
//     return pdo_query($sql, '%' . $keyword . '%', '%' . $keyword . '%');
// }
// update 
function update_hh($ma_nguoi_dung, $tieu_de, $noi_dung, $ma_cau_hoi)
{
    $sql = "UPDATE cau_hoi 
    SET ma_nguoi_dung=?,tieu_de=?,noi_dung=? WHERE ma_cau_hoi=?";
    pdo_execute($sql, $ma_nguoi_dung, $tieu_de, $noi_dung, $ma_cau_hoi);
}
// // số lượt lượt xem
// function cau_hoi_so_luot_luot_xem($ma_cau_hoi)
// {
//     $sql = "UPDATE cau_hoi SET so_luot_xem = so_luot_xem + 1 WHERE ma_cau_hoi = ? ";
//     pdo_execute($sql, $ma_cau_hoi);
// }
// // đếm số lượng hàng hóa
// function product_count()
// {
//     $sql = "SELECT COUNT(*) as total  FROM cau_hoi WHERE ma_cau_hoi";
//     return pdo_query($sql);
// }
