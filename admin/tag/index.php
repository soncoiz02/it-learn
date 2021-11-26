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
    else if(exist_param("update-tag")){
        $detail_tag = cate_select_by_id($cate_id);
        extract($detail_tag);
        $VIEW_NAME = 'tag/update.php';
    }
    else if(exist_param("btn-update")){
        try {
            cate_update($cate_id,$cate_name);
            unset($cate_name);
            $detail_tag = cate_select_by_id($cate_id);
            extract($detail_tag);
            $MESSAGE = "Cập nhật  thành công";
            $type = 'success';
        } catch (\Throwable $th) {
            $MESSAGE = "Cập nhật thất bại";
            $type = 'fail';
        }
        $VIEW_NAME = 'tag/update.php';
    }
    require '../layout.php';
?>