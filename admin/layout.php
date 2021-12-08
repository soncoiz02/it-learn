<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.2/chart.min.js" integrity="sha512-tMabqarPtykgDtdtSqCL3uLVM0gS1ZkUAVhRFu1vSEFgvB73niFQWJuvviDyBGBH22Lcau4rHB5p2K2T0Xvr6Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="<?=$STYLE_URL?>">
    <title>Document</title>
</head>
<body>
    <div class="admin">
        <section class="admin__sidebar">
            <div class="admin__sidebar-logo">
                <a href="<?=$ADMIN_URL?>">
                    <div class="img">
                        <img src="<?=$IMG_URL?>/else/logo.png" alt="">
                    </div>
                </a>
                <h2>Admin</h2>
            </div>
            <div class="admin__sidebar-nav">
                <div class="link">
                    <a href="<?=$ADMIN_URL?>/dashboard" class="link-title">
                        <p>
                            <i class="fas fa-tachometer-alt"></i>
                            Dashboard
                        </p>
                    </a>
                </div>
                <div class="link">
                    <div class="link-title">
                        <p>
                            <i class="fas fa-th-large"></i>
                            Danh mục
                        </p>
                        <i class="fas fa-caret-right"></i>
                    </div>
                    <div class="link-list">
                        <a href="<?=$ADMIN_URL?>/tag/?btn-list">Danh sách</a>
                        <a href="<?=$ADMIN_URL?>/tag/?btn-add">Thêm mới</a>
                    </div>
                </div>
                <div class="link">
                    <div class="link-title">
                        <p>
                            <i class="fas fa-list"></i>
                            Khóa học
                        </p>
                        <i class="fas fa-caret-right"></i>
                    </div>
                    <div class="link-list">
                        <a href="<?=$ADMIN_URL?>/course/?btn-list">Danh sách</a>
                        <a href="<?=$ADMIN_URL?>/course/?btn-add">Thêm mới</a>
                        <a href="<?=$ADMIN_URL?>/course/?btn-lesson">Thêm bài học</a>
                    </div>
                </div>
                <div class="link">
                    <div class="link-title">
                        <p>
                            <i class="fas fa-newspaper"></i>
                            Bài viết
                        </p>
                        <i class="fas fa-caret-right"></i>
                    </div>
                    <div class="link-list">
                        <a href="<?=$ADMIN_URL?>/blog?list-blog">Danh sách</a>
                    </div>
                </div>
                <div class="link">
                    <div class="link-title">
                        <p>
                            <i class="fas fa-question-circle"></i>
                            Câu hỏi
                        </p>
                        <i class="fas fa-caret-right"></i>
                    </div>
                    <div class="link-list">
                        <a href="<?=$ADMIN_URL?>/question?list-ques">Danh sách</a>
                    </div>
                </div>
                <div class="link">
                    <div class="link-title">
                        <p>
                            <i class="fas fa-users"></i>
                            Người dùng
                        </p>
                        <i class="fas fa-caret-right"></i>
                    </div>
                    <div class="link-list">
                        <a href="<?=$ADMIN_URL?>/user?list-user">Danh sách</a>
                    </div>
                </div>
                <div class="link">
                    <div class="link-title">
                        <p>
                            <i class="fas fa-comments"></i>
                            Bình luận
                        </p>
                        <i class="fas fa-caret-right"></i>
                    </div>
                    <div class="link-list">
                        <a href="<?=$ADMIN_URL?>/comment?course-list">Khóa học</a>
                        <a href="<?=$ADMIN_URL?>/comment?blog-list">Bài viết</a>
                        <a href="<?=$ADMIN_URL?>/comment?ask-list">Câu hỏi</a>
                    </div>
                </div>
                <div class="link">
                    <div class="link-title">
                        <p>
                            <i class="fas fa-university"></i>
                            Qizz
                        </p>
                        <i class="fas fa-caret-right"></i>
                    </div>
                    <div class="link-list">
                        <a href="<?=$ADMIN_URL?>/quiz?quiz-add">Thêm mới</a>
                        <a href="<?=$ADMIN_URL?>/quiz?quiz-list">Danh sách</a>
                    </div>
                </div>
            </div>
        </section>
        <section class="admin__main">
            <div class="admin__main-header">
                <div class="admin__main-header-search">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Tìm kiếm...">
                </div>
                <div class="admin__main-header-right">
                    <div class="btn-bar">
                        <i class="fas fa-bars"></i>
                    </div>
                    <div class="user">
                        <div class="avt">
                            <img src="<?=$IMG_URL?>/user/<?=$_SESSION['user']['avatar']?>" alt="">
                        </div>
                        <div class="detail">
                            <p class="fullname"><?=$_SESSION['user']['fullname']?></p>
                            <a href="<?=$ROOT_URL?>"><i class="fas fa-home"></i> Trang chủ</a>
                            <a href="" class="acc-setting">
                                <i class="fas fa-cog"></i>
                                Account setting
                            </a>
                            <a href="" class="logout">
                                <i class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>    
                        </div>
                    </div>
                </div>
            </div>
            <?php
                require $VIEW_NAME;
            ?>
        </section>
    </div>
    <script src="../../js/admin.js"></script>

</body>
</html>