<div class="courses">
    <div class="courses__lesson">
        <div class="container">
            <div class="courses__lesson-left">
                <div class="frame">
                    <?php
                        $lesson_detail = lesson_select_by_id($lesson_id);
                        extract($lesson_detail);
                        if($vid_id != ''){
                            $link = video_select_by_id($vid_id);
                    ?>
                        <div class="video">
                            <iframe src="<?=str_replace('watch', 'embed', $link['vid_link'])?>" frameborder="0" >
                            </iframe>
                        </div>
                    <?php
                        }
                        if($doc_id != ''){
                    ?>
                        <div class="document"></div>
                    <?php
                        }
                    ?>
                </div>
                <div class="comment">
                    <h2>Thảo luận</h2>
                    <div class="comment-form">
                        <div class="user">
                            <div class="avt">
                                <img src="<?=$IMG_URL?>/user/<?=$avatar?>" alt="">
                            </div>
                        </div>
                        <form action="" class="form">
                            <textarea name="" id="" cols="30" rows="10" placeholder="Bạn có thắc mắc gì trong bài học này ?"></textarea>
                            <input type="submit" value="Gửi">
                        </form>
                    </div>
                    <?php
                        if(count($list_comment) > 0){
                    ?>
                        <div class="comment-list">
                            <?php
                                foreach($list_comment as $key => $value){
                                    $cmt_user = user_select_by_id($value['username']);
                            ?>
                                <div class="item">
                                    <div class="avt">
                                        <img src="<?=$IMG_URL?>/user/<?=$cmt_user['avatar']?>" alt="">
                                    </div>
                                    <div class="detail">
                                        <div class="fullname"><?=$cmt_user['fullname']?></div>
                                        <p class="content"><?=$value['content']?></p>
                                    </div>
                                </div>
                            <?php
                                }
                            ?>
                        </div>
                    <?php
                        }
                        else{
                    ?>
                        <div class="comment-none">
                            <div class="img">
                                <img src="<?=$IMG_URL?>/else/cat-sleep3.jpg" alt="">
                            </div>
                            <p>Chưa có bình luận nào.</p>
                        </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
            <div class="courses__lesson-right">
                <h2 class="course-name"><?=$course_name?></h2>
                <div class="list-lesson">
                    <?php
                        foreach($list_lesson as $key => $value){
                            if($key == 0){
                    ?>
                        <div class="lesson unlock <?php 
                            if(isset($les_id)){
                                if($les_id == $value['lesson_id']){
                                    echo 'active';
                                }
                                else{
                                    echo '';
                                }
                            }
                            elseif(isset($first_lesson)){
                                echo 'active';
                            }
                        ?>">
                            <a href="index.php?lesson&les_id=<?=$value['lesson_id']?>&id=<?=$course_id?>" class="lesson-title">
                                <?=($key + 1).'. '.$value['title']?>
                                <span>
                                    <i class="fas fa-play-circle"></i>
                                    <i class="fas fa-lock"></i>
                                </span>
                            </a>
                            <?php
                                $quiz = quiz_select_by_lesson($value['lesson_id']);
                                if(count($quiz) > 0){
                            ?>
                                <div class="quiz">
                                    <?php
                                        foreach($quiz as $key => $value){
                                    ?> 
                                        <a href="index.php?quizz&quiz_id=<?=$value['quiz_id']?>" class="num-quiz"><?=$key?></a>
                                    <?php
                                        }
                                    ?>
                                </div>
                            <?php }?>
                            <div class="disable-bg"></div>
                        </div>
                    <?php
                        }
                        else{
                    ?>
                        <div class="lesson <?php 
                            if(isset($les_id)){
                                if($les_id == $value['lesson_id']){
                                    echo 'active';
                                }
                                else{
                                    echo '';
                                }
                            }
                        ?>">
                            <a href="index.php?lesson&les_id=<?=$value['lesson_id']?>&id=<?=$course_id?>" class="lesson-title">
                                <?=($key + 1).'. '.$value['title']?>
                                <span>
                                    <i class="fas fa-play-circle"></i>
                                    <i class="fas fa-lock"></i>
                                </span>
                            </a>
                            <?php
                                $quiz = quiz_select_by_lesson($value['lesson_id']);
                                if(count($quiz) > 0){
                            ?>
                            <div class="quiz">
                                <?php
                                    foreach($quiz as $key => $value){
                                ?> 
                                    <a href="index.php?quizz&quiz_id=<?=$value['quiz_id']?>" class="num-quiz"><?=$key?></a>
                                <?php
                                    }
                                ?>
                            </div>
                            <?php }?>
                            <div class="disable-bg"></div>
                        </div>
                    <?php
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>