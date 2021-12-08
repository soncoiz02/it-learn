<?php
    require_once '../../global.php';
    require '../../DAO/user.php';
    require '../../DAO/lesson.php';
    require '../../DAO/course.php';
    require '../../DAO/quiz.php';
    extract($_REQUEST);
    check_login();
    if(exist_param("study-history")){
        extract($_SESSION['user']);
        $list_course = course_select_by_user($username);
        $VIEW_NAME = 'user/study-history.php';
    }
    else if(exist_param("change-password")){
        $VIEW_NAME = 'user/change-password.php';
    }
    else if(exist_param("setting")){
        $user = $_SESSION['user'];
        extract($user);
        $VIEW_NAME = 'user/account-setting.php';
    }
    else if(exist_param("btn-update-password")){
        extract($_SESSION['user']);
        $old_password = user_select_password($username);
        $mess_err = '';
        if($password1 != $old_password){
            $mess_err = 'Mật khẩu cũ không đúng';
        }
        else{
            try {
                user_update_password($username, $password1);
                unset($password1, $password2, $password3);
                $MESSAGE = 'Đổi mật khẩu thành công';
                $type = 'success';
            } catch (PDOException $th) {
                $MESSAGE = 'Đổi mật khẩu thất bại';
                $type = 'fail';
            }
        }
        $VIEW_NAME = 'user/change-password.php';
    }
    else if(exist_param("btn-update")){
        $user = $_SESSION['user'];
        extract($user);
        $file_name = save_file("new_avt", "$IMAGE_DIR/user/");
        $avt = strlen(strval($file_name)) > 0 ? $file_name : $avt;
        if($fullname != '' && $email != ''){
            try {
                user_update($username, $fullname, $avt, $email, 0);
                $MESSAGE = 'Cập nhật thành công';
                $type = 'success';
            } catch (PDOException $th) {
                $MESSAGE = 'Cập nhật thất bại';
                $type = 'fail';
            }
        }
        $VIEW_NAME = 'user/account-setting.php';
    }
    require '../layout.php';
?>