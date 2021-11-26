<?php
    require_once '../../global.php';
    require '../../DAO/user.php';
    extract($_REQUEST);
    if(exist_param('btn-register')){
        $VIEW_NAME = 'register.php';
    }
    else{
        $VIEW_NAME = 'login.php';
    }

    if(exist_param('btn-insert')){
        $file_name = save_file("avatar", "$IMAGE_DIR/user/");
        $avt = $file_name ? $file_name : "user.png";
        try {
            user_insert($username, $password, $fullname,$avt, $email, '');
            unset($username, $password, $email, $fullname, $avt, $position);
            header("Location: $SITE_URL/login");
        } catch (Exception $exc) {
        }
    }
    if(exist_param('btn-login')){
        $user = user_select_by_id($username);
        if($user){
            if($user['password'] == $password){
                $_SESSION["user"] = $user;
                header("Location: $ROOT_URL");
            }
        }
    }
    else if(exist_param("btn-logout")){
            session_unset();
            header("Location: $ROOT_URL");
    }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=$STYLE_URL?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
<div class="login">
    <div class="container">
        <div class="login__form">
            <?php require $VIEW_NAME?>
        </div>
        <div class="login__img">
            <img src="<?=$IMG_URL?>/else/login-bg.png" alt="">
        </div>
    </div>
    <div class="shape a"></div>
    <div class="shape b"></div>
    <div class="shape c"></div>
    <div class="shape d"></div>
    <div class="shape e"></div>
</div>
</body>
</html>