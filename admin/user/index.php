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
    else if(exist_param("btn-update")){
        $file_name = save_file("avt", "$IMAGE_DIR/user/");
        $img = strlen(strval($file_name)) > 0 ? $file_name : $current_avt;
        try{
            user_update($username, $fullname,$img, $email,$position);
            unset($fullname,$img, $email,$position);
            $user =  user_select_by_id($username);
            extract($user);
            $MESSAGE = 'Cập nhật thành công';
            $type = 'success';
        }
        catch(PDOException $e){
            $MESSAGE = 'Cập nhật thất bại';
            $type = 'fail';
        }
        $VIEW_NAME = 'user/update.php';
    }
    else{
        $VIEW_NAME = 'user/list.php';
    }
    require '../layout.php';
?>