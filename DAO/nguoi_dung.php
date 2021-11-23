
<?php
// Truy vấn danh sách
function nguoi_dung_selectAll()
{
    $sql = "SELECT * FROM nguoi_dung ORDER BY ma_nguoi_dung";
    return pdo_query($sql);
}

// Thêm
function nguoi_dung_insert($ma_nguoi_dung, $ho_ten, $email, $mat_khau, $anh_dai_dien, $vai_tro)
{
    $sql = "INSERT INTO nguoi_dung VALUES(?,?,?,?,?,?)";
    pdo_execute($sql, $ma_nguoi_dung, $ho_ten, $email, $mat_khau, $anh_dai_dien, $vai_tro);
}

// Xóa
function nguoi_dung_delete($ma_nguoi_dung)
{
    $sql = "DELETE FROM nguoi_dung WHERE ma_nguoi_dung=?";
    pdo_execute($sql, $ma_nguoi_dung);
}

// Lấy thông tin
function get_info_kh($ma_nguoi_dung)
{
    $sql = "SELECT * FROM nguoi_dung WHERE ma_nguoi_dung=?";
    return pdo_query_one($sql, $ma_nguoi_dung);
} 

// Cập nhật
function nguoi_dung_update($ho_ten, $email, $mat_khau, $anh_dai_dien, $vai_tro, $ma_nguoi_dung)
{
    $sql = "UPDATE nguoi_dung SET ho_ten=?,email=?,mat_khau=?,anh_dai_dien=?,vai_tro=? WHERE ma_nguoi_dung=?";
    pdo_execute($sql, $ho_ten, $email, $mat_khau, $anh_dai_dien, $vai_tro, $ma_nguoi_dung);
}
// cập nhật mật khẩu
function kh_update_mat_khau($mat_khau, $ma_nguoi_dung)
{
    $sql = "UPDATE nguoi_dung SET mat_khau = ? WHERE ma_nguoi_dung  = ?";
    pdo_execute($sql, $mat_khau, $ma_nguoi_dung);
}
function nguoi_dung_exist($ma_nguoi_dung)
{
    $sql = "SELECT count(*) FROM nguoi_dung WHERE $ma_nguoi_dung=?";
    return pdo_query_value($sql, $ma_nguoi_dung) > 0;
}
function nguoi_dung_select_by_role($vai_tro)
{
    $sql = "SELECT * FROM nguoi_dung WHERE vai_tro=?";
    return pdo_query($sql, $vai_tro);
}
?>