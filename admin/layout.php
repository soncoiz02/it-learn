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
    <div class="admin">
        <section class="admin__sidebar">
            <div class="admin__sidebar-logo">
                <div class="img">
                    <img src="" alt="">
                </div>
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
                            <img src="" alt="">
                        </div>
                        <div class="detail">
                            <p class="fullname">Fullname</p>
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