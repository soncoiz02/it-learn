<?php
    require '../../global.php';
    extract($_REQUEST);
    if(exist_param('btn-register')){
        $VIEW_NAME = 'register.php';
    }
    else{
        $VIEW_NAME = 'login.php';
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