<div class="blogs">
    <div class="blogs__list">
        <div class="container">
            <ul class="blogs__list-nav">
                    <li class="blogs__list-nav-link"><a href="index.php?list-blog">Tất cả bài viết</a></li>
                    <?php
                        if(isset($_SESSION['user'])){
                        $user = $_SESSION['user'];
                    ?>
                        <li class="blogs__list-nav-link active"><a href="">Bài viết của bạn</a></li>
                        <li class="blogs__list-nav-link"><a href="index.php?blog-saved">Bài viết đã lưu</a></li>
                    <?php
                        }
                    ?>
                </ul>
            </ul>
            <?php
                if(strlen($MESSAGE) > 0){
            ?>
                <div class="message <?=$type?>">
                    <div class="icon">
                        <i class="fas fa-check"></i>
                        <i class="fas fa-times"></i>
                    </div>
                    <p><?=$MESSAGE?></p>
                </div>
            <?php
                }
            ?>
            <?php
                if(count($list_blog) > 0){
            ?>
                <div class="blogs__list-all">
                    <div class="blogs__list-all-list">
                        <?php
                            $today = date('Y-m-d');
                            foreach($list_blog as $key => $value){
                                $author = user_select_by_id($value['username']);
                                extract($author);
                        ?>
                            <div class="blogs__list-all-item">
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
                                    <div class="btn">
                                        <a href="index.php?update-blog&blog_id=<?=$value['blog_id']?>" class="update-btn"><i class="fas fa-tools"></i></a>
                                        <a href="index.php?delete-blog&blog_id=<?=$value['blog_id']?>" class="delete-btn" onclick="return confirm('Bạn thực sự muốn xóa bài viết này?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="main-content">
                                    <div class="blog-content">
                                        <a href="index.php?detail-blog&blog_id=<?=$value['blog_id']?>" class="blog-title"><?=$value['title']?></a>
                                        <div class="blog-resume"><?=substr($value['content'], 0, 200)?></div>
                                    </div>
                                    <?php
                                        if($value['avatar'] != ''){
                                    ?>
                                        <div class="blog-img">
                                            <img src="<?=$IMG_URL?>/blog/<?=$value['avatar']?>" alt="">
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
                                ?></p>
                                </div>
                            </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            <?php
                }
                else{
            ?>
                <div class="blogs__list-error">
                    <div class="img">
                        <img src="<?=$IMG_URL?>/else/cat-sleep.jpg" alt="">
                    </div>
                    <p>Chưa có bài viết nào được đăng.</p>
                </div>
            <?php
                }
            ?>
                <?php
                    if(isset($_SESSION['user'])){
                ?>
                    <div class="btn-add">
                        <a href="index.php?add-blog">
                            <i class="far fa-edit"></i>
                        </a>
                    </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
</div>