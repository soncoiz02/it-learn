<?php
// KẾT NỐI CƠ SỞ DỮ LIỆU
function pdo_get_connection()
{
    $servername = "localhost";
    // $username = "root";
    // $password = "";
    $username = "root";
    $password = "";
    $conn = '';
    try {
        $conn = new PDO("mysql:host=$servername;dbname=itlearn", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully";
        return $conn; //trả về kết nối 
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
// sql câu lệnh sql
// sql,...,id tham số  truyền vào
// insert into loai(ten_loai) value (?); "laptop"
// update bảng lọai set ten_loai = ? where ma_loai =?, "Laptop","1"
// "delete from loai where ma_loai=?" , "1"
// THỰC THI CƠ SỞ DỮ LIỆU   
function pdo_execute($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    // tách chuổi tham số slice
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
    } catch (PDOException $e) {
        throw $e;
        echo "Lỗi truy vấn ";
    } finally {
        unset($conn);
    }
}

// truy vấn nhiều dữ liệu
function pdo_query($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    // tách chuổi tham số slice
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows = $stmt->fetchAll();
        return $rows;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
// đếm số lượng rows
function pdo_count($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    // tách chuổi tham số slice
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows = $stmt->fetch();
        return $rows;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}



// truy vấn 1 dữ liệu
// function pdo_query_one($sql)
// {
//     $sql_args = array_slice(func_get_args(), 1);
//     // tách chuổi tham số slice
//     try {
//         $conn = pdo_get_connection();
//         $stmt = $conn->prepare($sql);
//         $stmt->execute($sql_args);
//         $row = $stmt->fetch(PDO::FETCH_ASSOC);
//         return $row;
//     } catch (PDOException $e) {
//         throw $e;
//     } finally {
//         unset($conn);
//     }
// }


function pdo_query_one($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    // tách chuổi tham số slice
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}



// value 

function pdo_query_value($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return array_values($row)[0];
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
