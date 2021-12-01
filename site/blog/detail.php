<div class="blogs">
    <div class="blogs__detail">
        <div class="container">
            <div class="blogs__detail-left">
                <h1><?=$title?></h1>
                <div class="content">
                    <?=$content?>
                </div>
            </div>
            <div class="blogs__detail-right">
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
                    <div class="list-icon">
                        <div class="icon">
                            <a href="" class="heart">
                                <i class="fas fa-heart"></i>
                                <i class="far fa-heart"></i>
                            </a>
                            <?=$like_num?>
                        </div>
                        <div class="icon">
                            <a href="" class="bookmark">
                                <i class="fas fa-bookmark"></i>
                                <i class="far fa-bookmark"></i>
                            </a>
                        </div>
                        <div class="icon">
                            <a href="" class="share">
                                <i class="fas fa-share"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="comment">
                    <?php
                        if(isset($_SESSION['user'])){
                    ?>
                        <div class="comment-form">
                            <div class="avt-user">
                                <img src="<?=$IMG_URL?>/user/<?=$_SESSION['user']['avatar']?>" alt="">
                            </div>
                            <form action="index.php" class="form">
                                <input type="text" placeholder="Suy nghĩ của bạn về bài viết?" name="content" />
                                <input type="hidden" name="blog_id" value="<?=$blog_id?>">
                                <input type="submit" value="Gửi" name="btn-comment">
                            </form>
                        </div>
                    <?php
                        }
                    ?>
                    <h2>Nhận xét về bài viết</h2>
                    <div class="comment-list">
                        <?php
                            if(count($list_comment) > 0){
                            foreach($list_comment as $key => $value){
                                $user_comment = user_select_by_id($value['username']);
                                extract($user_comment);
                        ?>
                            <div class="item">
                                <div class="avt">
                                    <img src="<?=$IMG_URL?>/user/<?=$avatar?>" alt="">
                                </div>
                                <div class="detail">
                                    <div class="fullname"><?=$fullname?></div>
                                    <p class="content"><?=$value['content']?></p>
                                </div>
                            </div>
                        <?php
                            }
                        }
                        else {
                        ?>
                            <p>Chưa có nhận xét nào</p>
                        <?php
                        }
                        ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>