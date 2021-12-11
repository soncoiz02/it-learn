<div class="search">
    <div class="container">
        <h2>Kết quả tìm kiếm cho <span>"<?=$search_key?>"</span></h2>
        <div class="course-list">
            <p>Các khóa học liên quan</p>
            <div class="list">
                <?php 
                    if(count($list_course) > 0){
                        foreach($list_course as $course_key => $course_value){
                ?>
                    <div class="item">
                        <div class="img">
                            <img src="<?=$IMG_URL?>/course/<?=$course_value['course_img']?>" alt="">
                        </div>
                        <?php
                            if(isset($_SERVER['user'])){
                                if(course_exist_user_signed($course_value['course_id'], $_SESSION['user']['username']) > 0){
                        ?>
                            <a href="<?=$SITE_URL?>/course?first-lesson&id=<?=$value['course_id']?>" class="name">
                                    <?=$course_value['course_name']?>
                            </a>
                        <?php
                                }
                                else{
                        ?>
                            <a href="index.php?detail-course&id=<?=$value['course_id']?>" class="name">
                                    <?=$course_value['course_name']?>
                            </a>
                        <?php
                                }
                        ?>
                            
                        <?php
                            }
                            else{
                        ?>
                            <a href="<?=$SITE_URL?>/course?detail-course&id=<?=$course_value['course_id']?>" class="name">
                                <?=$course_value['course_name']?>
                            </a>
                        <?php
                            }
                        ?>
                        <div class="user-count">
                            <i class="fas fa-users"></i>
                            <span><?=number_format(course_count_user($course_value['course_id']))?></span>
                        </div>
                    </div>
                <?php
                        }
                    }
                    else{
                ?>
                    <p class="mess">Không có khóa học nào liên quan</p>
                <?php
                    }
                ?>
            </div>
        </div>
        <div class="blog-list">
            <p>Các bài viết liên quan</p>
            <div class="list">
                <?php
                    if(count($list_blog) > 0){
                        foreach($list_blog as $blog_key => $blog_value){
                            $author = user_select_by_id($blog_value['username']);
                            extract($author);
                ?>
                    <div class="item">
                        <div class="top">
                            <div class="user">
                                <div class="avt">
                                    <img src="<?=$IMG_URL?>/user/<?=$avatar?>" alt="">
                                </div>
                                <div class="detail">
                                    <div class="fullname"><?=$fullname?></div>
                                    <div class="username">@<?=$username?></div>
                                </div>
                            </div>
                            <div class="mark-btn">
                                <i class="fas fa-bookmark"></i>
                                <i class="far fa-bookmark"></i>
                            </div>
                        </div>
                        <div class="main-content">
                            <div class="blog-content">
                                <a href="index.php?detail-blog&blog_id=<?=$blog_value['blog_id']?>" class="blog-title"><?=$blog_value['title']?></a>
                                <div class="blog-resume"><?=substr($blog_value['content'], 0, 200)?></div>
                            </div>
                            <?php
                                if($blog_value['avatar'] != ''){
                            ?>
                                <div class="blog-img">
                                    <img src="<?=$IMG_URL?>/blog/<?=$blog_value['avatar']?>" alt="">
                                </div>
                            <?php
                                }
                                else{
                            ?>
                                <div class="blog-img">
                                    <img src="<?=$IMG_URL?>/else/cat-eat.jpg">
                                </div>
                            <?php
                                }
                            ?>
                        </div>
                        <div class="bottom">
                            <p class="day-left"><?php
                                $date = handle_date($today, $blog_value['date']);
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
                            ?></p>
                        </div>
                    </div>
                <?php
                        }
                ?>
                <?php
                    }
                    else{
                ?>
                    <p class="mess">Không có bài viết nào liên quan</p>
                <?php
                    }
                ?>
            </div>
        </div>
        <div class="question-list">
            <p>Các câu hỏi liên quan</p>
            <div class="list">
                <?php 
                    if(count($list_ques) > 0){
                        foreach($list_ques as $ques_key => $ques_value){
                            $author = user_select_by_id($ques_value['username']);
                            extract($author);
                ?>
                    <div class="item">
                    <div class="top">
                        <div class="user">
                            <div class="avt">
                                <img src="<?=$IMG_URL?>/user/<?=$avatar?>" alt="">
                            </div>
                            <div class="detail">
                                <div class="fullname"><?=$fullname?></div>
                                <div class="username">@<?=$username?></div>
                            </div>
                        </div>
                        <div class="mark-btn">
                            <i class="far fa-bookmark"></i>
                            <i class="fas fa-bookmark"></i>
                        </div>
                    </div>
                    <div class="main-content">
                        <a href="index.php?detail-ques&ques_id=<?=$ques_value['ques_id']?>" class="content"><?=$ques_value['content']?></a>
                    </div>
                    <div class="list-tag">
                        <?php
                            $list_tag = explode(', ', $ques_value['tag']);
                            foreach($list_tag as $tag_value){
                        ?>
                            <p class="tag"><?=$tag_value?></p>
                        <?php
                            }
                        ?>
                    </div>
                    <div class="bottom">
                        <div class="day-left"><?php
                                    $date = handle_date($today, $ques_value['date_ask']);
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
                                ?></div>
                        <div class="answer-count"><?=question_count_by_comment($ques_value['ques_id'])?> trả lời</div>
                    </div>
                    </div>
                <?php
                        }
                    }
                    else{
                ?> 
                    <p class="mess">Không câu hỏi nào liên quan</p>
                <?php 
                    }
                ?>
            </div>
        </div>
    </div>
</div>