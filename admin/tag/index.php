<?php
    require_once '../../global.php';
    require '../../DAO/cate.php';
    extract($_REQUEST);
    if(exist_param("btn-list")){
        $list_cate = cate_select_all();
        $VIEW_NAME = "tag/list.php";
    }
    else if(exist_param("btn-add")){
        $VIEW_NAME = "tag/add.php";
    }
    else if(exist_param("btn-insert")){
        if($cate_name != ''){
            try {
                cate_insert($cate_name);
                unset($cate_name, $cate_id);
                $MESSAGE = "Thêm mới thành công";
                $type = 'success';
            }
            catch (Exception $exc) {
                $MESSAGE = "Thêm mới thất bại";
                $type = 'fail';
            }
        }
        else{
            $MESSAGE = 'Chưa nhập đủ thông tin';
            $type = 'fail';
        }
        $VIEW_NAME = "tag/add.php";
    }
    else if(exist_param("btn-delete")){
        try{
            cate_delete($cate_id);
            $list_cate = cate_select_all();
            $MESSAGE = "Xóa  thành công";
            $type = 'success';
        }
        catch (Exception $exc) {
            $MESSAGE = "Xóa thất bại";
            $type = 'fail';
        }
        $VIEW_NAME = "tag/list.php";
    }
    require '../layout.php';
?>