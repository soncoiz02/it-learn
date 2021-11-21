<?php

function quiz_selectall()
{
    $sql = "SELECT * FROM quiz ORDER BY ma_quiz	 DESC";
    return pdo_query($sql);
}

// lấy thông tin 1 mã
function quiz_getinfo($ma_quiz)
{
    $sql = "SELECT * FROM quiz WHERE ma_quiz=?";
    return pdo_query_one($sql, $ma_quiz);
}

// Thêm mới

function quiz_insert($ma_bai_hoc, $cau_hoi, $dap_an_1, $dap_an_2, $dap_an_3, $dap_an_dung)
{
    $sql = "INSERT INTO quiz(ma_bai_hoc,cau_hoi,dap_an_1,dap_an_2,dap_an_3,dap_an_dung) VALUES(?,?,?,?,?,?)"; 
    // gọi lại hàm thực thi, tương tác dữ liệu
    pdo_execute($sql, $ma_bai_hoc, $cau_hoi, $dap_an_1, $dap_an_2, $dap_an_3, $dap_an_dung);
}
// sx theo bài học 
function quiz_select_by_bai_hoc($ma_bai_hoc)
{
    $sql = "SELECT * FROM quiz WHERE ma_bai_hoc = ?";
    return  pdo_query($sql, $ma_bai_hoc);
}
// // hiển thị top 10;
// function quiz_top10()
// {
//     $sql = "SELECT * FROM quiz WHERE so_luot_xem > 0 ORDER BY so_luot_xem DESC LIMIT 0,10";
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
//     $sql = "SELECT * FROM quiz  ORDER BY ma_quiz  DESC LIMIT $tung_trang,$sp_tung_trang";
//     return pdo_query($sql);
// }
//
// tìm hàng đặc biệt
// function khoa_dac_biet()
// {
//     $sql = "SELECT * FROM quiz WHERE dac_biet = 1";
//     return pdo_query($sql);
// }

// xóa 
function quiz_delete($ma_quiz)
{
    $sql = "DELETE FROM quiz WHERE ma_quiz=?";
    pdo_execute($sql, $ma_quiz);
}
// // hiển thị theo keywords
// function quiz_select_by_keyword($keyword)
// {
//     $sql = "SELECT * FROM quiz a INNER JOIN  bai_hoc b ON b.ma_bai_hoc = a.ma_bai_hoc 
//     WHERE ten_quiz LIKE ? OR ten_bai_hoc LIKE ? ";
//     return pdo_query($sql, '%' . $keyword . '%', '%' . $keyword . '%');
// }
// update 
function update_hh($ma_bai_hoc, $cau_hoi, $dap_an_1, $dap_an_2, $dap_an_3, $dap_an_dung, $ma_quiz)
{
    $sql = "UPDATE quiz 
    SET ma_bai_hoc=?,cau_hoi=?,dap_an_1=?,dap_an_2=?,dap_an_3=?,dap_an_dung=? WHERE ma_quiz=?";
    pdo_execute($sql, $ma_bai_hoc, $cau_hoi, $dap_an_1, $dap_an_2, $dap_an_3, $dap_an_dung, $ma_quiz);
}
// // số lượt lượt xem
// function quiz_so_luot_luot_xem($ma_quiz)
// {
//     $sql = "UPDATE quiz SET so_luot_xem = so_luot_xem + 1 WHERE ma_quiz = ? ";
//     pdo_execute($sql, $ma_quiz);
// }
// // đếm số lượng 
// function product_count()
// {
//     $sql = "SELECT COUNT(*) as total  FROM quiz WHERE ma_quiz";
//     return pdo_query($sql);
// }
