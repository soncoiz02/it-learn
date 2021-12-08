<div class="home">
    <section class="home__banner">
        <div class="container">
            <div class="swiper swiper-banner">
                <div class="swiper-wrapper">
                    <!-- <div class="swiper-slide banner">
                        <div class="home__banner-img">
                            <img src="<?=$IMG_URL?>/else/bg1.png" alt="">
                        </div>
                    </div> -->
                    <div class="swiper-slide banner">
                        <div class="home__banner-img">
                            <img src="<?=$IMG_URL?>/else/bg2.jpg" alt="">
                        </div>
                    </div>
                    <!-- <div class="swiper-slide banner">
                        <div class="home__banner-img">
                            <img src="" alt="">
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
    <section class="home__course">
        <div class="container">
            <h2 class="title">
                Khóa học nổi bật
            </h2>
            <div class="swiper swiper-course">
                <div class="swiper-wrapper">
                    <?php
                        foreach($top10_courses as $key => $value){
                    ?>
                        <div class="swiper-slide course">
                            <div class="img">
                                <img src="<?=$IMG_URL?>/course/<?=$value['course_img']?>" alt="">
                            </div>
                            <?php
                                if(isset($_SESSION['user'])){
                                    $exist_user = course_exist_user_signed($value['course_id'], $_SESSION['user']['username']);
                                    if($exist_user > 0){
                            ?>
                                <a href="<?=$SITE_URL?>/course/?first-lesson&id=<?=$value['course_id']?>" class="name">
                                    <?=$value['course_name']?>
                                </a>
                            <?php
                                    }
                                    else{
                            ?>
                                <a href="<?=$SITE_URL?>/course/?detail-course&id=<?=$value['course_id']?>" class="name">
                                    <?=$value['course_name']?>
                                </a>
                            <?php
                                    }
                                }
                                else{
                            ?>
                                <a href="<?=$SITE_URL?>/course/?detail-course&id=<?=$value['course_id']?>" class="name">
                                    <?=$value['course_name']?>
                                </a>
                            <?php
                                }
                            ?>
                            <div class="user-count">
                                <i class="fas fa-users"></i>
                                <span><?=number_format(course_count_user($value['course_id']))?></span>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                </div>
                <div class="swiper-scrollbar"></div>
            </div>
            <div class="btn-see-all">
                <a href="<?=$SITE_URL?>/course?btn-list">Xem tất cả ></a>
            </div>
        </div>
    </section>

    <?php
        if(count($list_blog) > 0){
    ?>
    <section class="home__blog">
        <div class="container">
            <h2 class="title">
                Bài viết nổi bật
            </h2>
            <div class="swiper swiper-blog">
                <div class="swiper-wrapper">
                    <?php
                        foreach($list_blog as $key => $value){
                            $author = user_select_by_id($value['username']);
                    ?>
                        <div class="swiper-slide item">
                            <div class="img">
                                <?php
                                    if($value['avatar'] == ''){
                                ?>
                                    <img src="<?=$IMG_URL?>/else/cat-eat.jpg" alt="">
                                <?php
                                    }
                                    else{
                                ?>
                                    <img src="<?=$IMG_URL?>/blog/<?=$value['avatar']?>" alt="">
                                <?php
                                    }
                                ?>
                            </div>
                            <a href="<?=$SITE_URL?>/blog/?detail-blog&blog_id=<?=$value['blog_id']?>" class="blog-name"><?=$value['title']?></a>
                            <div class="bottom">
                                <div class="user">
                                    <div class="avatar">
                                        <img src="<?=$IMG_URL?>/user/<?=$author['avatar']?>" alt="">
                                    </div>
                                    <div class="fullname"><?=$author['fullname']?></div>
                                </div>
                                <div class="day-left">
                                    <?php
                                        $today = date('Y-m-d');
                                        $date = handle_date($today, $value['date']);
                                        $month = floor($date / 30);
                                        if($month > 0){
                                            echo "$month tháng trước";
                                        }
                                        else if($date == 0){
                                            echo "Hôm nay";
                                        }
                                        else{
                                            echo "$date ngày trước";
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                </div>
                <div class="swiper-scrollbar"></div>
            </div>
            <div class="btn-see-all">
                <a href="<?=$SITE_URL?>/blog?list-blog">Xem tất cả ></a>
            </div>
        </div>
    </section>
    <?php
        }
    ?>

    <section class="home__study">
        <div class="container">
            <h2 class="title">Học như thế nào</h2>
            <div class="content">
                <div class="home__study-roadmap">
                    <div class="case" style="--i:1s">
                        <div class="case-left">
                            <div class="number">
                                1
                            </div>
                            <div class="vector">
                                <div class="dot"></div>
                                <div class="line"></div>
                                <div class="dot"></div>
                            </div>
                        </div>
                        <div class="case-right">
                            <p class="case-title">Tự học với những tài liệu được gợi ý</p>
                            <p class="detail">Hoàn thành các objective cho từng khóa học bằng cách học qua các tài liệu được gợi ý sẵn.</p>
                        </div>
                    </div>
                    <div class="case" style="--i:2s">
                        <div class="case-left">
                            <div class="number">
                                2
                            </div>
                            <div class="vector">
                                <div class="dot"></div>
                                <div class="line"></div>
                                <div class="dot"></div>
                            </div>
                        </div>
                        <div class="case-right">
                            <p class="case-title">Tự học với những tài liệu được gợi ý</p>
                            <p class="detail">Hoàn thành các objective cho từng khóa học bằng cách học qua các tài liệu được gợi ý sẵn.</p>
                        </div>
                    </div>
                    <div class="case" style="--i:3s">
                        <div class="case-left">
                            <div class="number">
                                3
                            </div>
                        </div>
                        <div class="case-right">
                            <p class="case-title">Tự học với những tài liệu được gợi ý</p>
                            <p class="detail">Hoàn thành các objective cho từng khóa học bằng cách học qua các tài liệu được gợi ý sẵn.</p>
                        </div>
                    </div>
                </div>
                <div class="home__study-img">
                    <img src="<?=$ASSETS_URL?>/img/else/img-1.png" alt="">
                </div>
            </div>
        </div>
    </section>
</div>
