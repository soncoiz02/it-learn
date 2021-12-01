<?php
    require_once '../../global.php';
    require '../../DAO/user.php';

    extract($_REQUEST);

    if(exist_param("list-user")){
        $list_user = user_select_all();
        $VIEW_NAME = 'user/list.php';
    }
    else if(exist_param("delete-user")){
        try {
            user_delete($user_id);
            $list_user = user_select_all();
        } catch (PDOException $th) {
            //throw $th;
        }
        $VIEW_NAME = 'user/list.php';
    }
    else{
        $VIEW_NAME = 'user/list.php';
    }
    require '../layout.php';
?>