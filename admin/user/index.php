<?php
    require_once '../../global.php';
    require '../../DAO/user.php';
    require '../../DAO/course.php';
    require '../../DAO/lesson.php';
    require '../../DAO/quiz.php';

    extract($_REQUEST);
    check_login();
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
    else if(exist_param("update-user")){
        $user = user_select_by_id($user_id);
        extract($user);
        $VIEW_NAME = 'user/update.php';
    }
    else if(exist_param("detail-user")){
        $user = user_select_by_id($user_id);
        $list_course = course_select_by_user($user_id);
        extract($user);
        $VIEW_NAME = 'user/detail.php';
    }
    else{
        $VIEW_NAME = 'user/list.php';
    }
    require '../layout.php';
?>