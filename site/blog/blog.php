<div class="blogs">
    <div class="blogs__list">
        <div class="container">
            <ul class="blogs__list-nav">
                    <li class="blogs__list-nav-link active"><a href="">Tất cả bài viết</a></li>
                    <?php
                        if(isset($_SESSION['user'])){
                        $user = $_SESSION['user'];
                    ?>
                    <li class="blogs__list-nav-link"><a href="">Bài viết của bạn</a></li>
                    <li class="blogs__list-nav-link"><a href="">Bài viết đã lưu</a></li>
                    <?php
                        }
                    ?>
                </ul>
            </ul>
            <div class="blogs__list-all">
                <div class="blogs__list-all-list">
                    <div class="blogs__list-all-item">
                        <div class="top">
                            <div class="user">
                                <div class="avt">
                                    <img src="" alt="">
                                </div>
                                <div class="detail">
                                    <div class="fullname">Fullname</div>
                                    <div class="username">@username</div>
                                </div>
                            </div>
                            <div class="mark-btn">
                                <i class="fas fa-bookmark"></i>
                                <i class="far fa-bookmark"></i>
                            </div>
                        </div>
                        <div class="main-content">
                            <div class="blog-content">
                                <div class="blog-title">Tiêu đề bài viết</div>
                                <div class="blog-resume">Nội dung tóm tắt</div>
                            </div>
                            <div class="blog-img">
                                <img src="" alt="">
                            </div>
                        </div>
                        <div class="bottom">
                            <p class="day-left">5 ngày trước</p>
                        </div>
                    </div>
                    <div class="blogs__list-all-item">
                        <div class="top">
                            <div class="user">
                                <div class="avt">
                                    <img src="" alt="">
                                </div>
                                <div class="detail">
                                    <div class="fullname">Fullname</div>
                                    <div class="username">@username</div>
                                </div>
                            </div>
                            <div class="mark-btn">
                                <i class="fas fa-bookmark"></i>
                                <i class="far fa-bookmark"></i>
                            </div>
                        </div>
                        <div class="main-content">
                            <div class="blog-content">
                                <div class="blog-title">Tiêu đề bài viết</div>
                                <div class="blog-resume">Nội dung tóm tắt</div>
                            </div>
                            <div class="blog-img">
                                <img src="" alt="">
                            </div>
                        </div>
                        <div class="bottom">
                            <p class="day-left">5 ngày trước</p>
                        </div>
                    </div>
                    <div class="blogs__list-all-item">
                        <div class="top">
                            <div class="user">
                                <div class="avt">
                                    <img src="" alt="">
                                </div>
                                <div class="detail">
                                    <div class="fullname">Fullname</div>
                                    <div class="username">@username</div>
                                </div>
                            </div>
                            <div class="mark-btn">
                                <i class="fas fa-bookmark"></i>
                                <i class="far fa-bookmark"></i>
                            </div>
                        </div>
                        <div class="main-content">
                            <div class="blog-content">
                                <div class="blog-title">Tiêu đề bài viết</div>
                                <div class="blog-resume">Nội dung tóm tắt</div>
                            </div>
                            <div class="blog-img">
                                <img src="" alt="">
                            </div>
                        </div>
                        <div class="bottom">
                            <p class="day-left">5 ngày trước</p>
                        </div>
                    </div>
                    <div class="blogs__list-all-item">
                        <div class="top">
                            <div class="user">
                                <div class="avt">
                                    <img src="" alt="">
                                </div>
                                <div class="detail">
                                    <div class="fullname">Fullname</div>
                                    <div class="username">@username</div>
                                </div>
                            </div>
                            <div class="mark-btn">
                                <i class="fas fa-bookmark"></i>
                                <i class="far fa-bookmark"></i>
                            </div>
                        </div>
                        <div class="main-content">
                            <div class="blog-content">
                                <div class="blog-title">Tiêu đề bài viết</div>
                                <div class="blog-resume">Nội dung tóm tắt</div>
                            </div>
                            <div class="blog-img">
                                <img src="" alt="">
                            </div>
                        </div>
                        <div class="bottom">
                            <p class="day-left">5 ngày trước</p>
                        </div>
                    </div>
                    <div class="blogs__list-all-item">
                        <div class="top">
                            <div class="user">
                                <div class="avt">
                                    <img src="" alt="">
                                </div>
                                <div class="detail">
                                    <div class="fullname">Fullname</div>
                                    <div class="username">@username</div>
                                </div>
                            </div>
                            <div class="mark-btn">
                                <i class="fas fa-bookmark"></i>
                                <i class="far fa-bookmark"></i>
                            </div>
                        </div>
                        <div class="main-content">
                            <div class="blog-content">
                                <div class="blog-title">Tiêu đề bài viết</div>
                                <div class="blog-resume">Nội dung tóm tắt</div>
                            </div>
                            <div class="blog-img">
                                <img src="" alt="">
                            </div>
                        </div>
                        <div class="bottom">
                            <p class="day-left">5 ngày trước</p>
                        </div>
                    </div>
                </div>
                <div class="btn-add">
                    <a href="">
                        <i class="far fa-edit"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>