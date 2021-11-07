<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?=$STYLE_URL?>">
    <title>Document</title>
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="header__logo">
                <div class="header__logo-img">
                    <img src="" alt="">
                </div>
                <div class="header__logo-text">
                    <p>ITLearn</p>
                    <span>Learn to Code</span>
                </div>
            </div>
            <div class="header__search">
                <form class="header__search-form">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Tìm kiếm khóa học, bài viết...">
                </form>
                <div class="btn-close">
                    <i class="fas fa-times"></i>
                </div>
            </div>
            <div class="header__right">
                <?php
                    if(isset($_SESSION['user'])){
                        $user = $_SESSION['user'];
                ?>

                <?php
                    }
                    else{
                ?>
                    <div class="header__right-btn-login">
                        <a href="">Đăng nhập</a>
                    </div>
                <?php
                    }
                ?>
                <div class="header__right-btn-bar">
                    <i class="fas fa-bars"></i>
                </div>            
            </div>
        </div>
    </header>
    <main class="main">
        <section class="main__side-bar">
            <ul class="nav">
                <li class="nav-link">
                    <a href="">
                        <i class="fas fa-home"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="">
                        <i class="fas fa-book-open"></i>
                        <span>Học</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="">
                        <i class="fas fa-question-circle"></i>
                        <span>Hỏi</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="">
                        <i class="far fa-newspaper"></i>
                        <span>Diễn đàn</span>
                    </a>
                </li>
            </ul>
        </section>
        <section class="main__page">
            <?php
                require $VIEW_NAME;
            ?>
        </section>
    </main>
    <script>
        const listLink = document.querySelectorAll('.nav-link')
        const path = document.location.pathname
        if(path == '/itlearn/site/home/'){
            listLink[0].classList.add('active')
        }
        else if(path == '/itlearn/site/course/'){
            listLink[1].classList.add('active')
        }
        else if(path == '/itlearn/site/ask/'){
            listLink[2].classList.add('active')
        }
        else if(path == '/itlearn/site/blog/'){
            listLink[3].classList.add('active')
        }
    </script>
</body>

</html>