<?php
    require_once '../../global.php';
    require '../../DAO/user.php';
    if(exist_param("list-user")){
        $list_user = user_select_all();
        $VIEW_NAME = 'user/list.php';
    }
    else{
        $VIEW_NAME = 'user/list.php';
    }
    require '../layout.php';
?>