<div class="courses">
    <div class="courses__lesson">
        <div class="container">
            <div class="courses__lesson-left">
                <div class="frame">
                    <?php
                        $lesson_detail = lesson_select_by_id($lesson_id);
                        extract($lesson_detail);
                        if($link_video != ''){
                    ?>
                        <div class="video">
                            <iframe src="<?=str_replace('watch?v=', 'embed/', $link_video)?>" frameborder="0" >
                            </iframe>
                        </div>
                    <?php
                        }
                        if($document != ''){
                    ?>
                        <div class="document"></div>
                    <?php
                        }
                    ?>
                </div>
                <div class="comment">
                    <h2>Thảo luận</h2>
                    <div class="comment-form">
                        <div class="user-avt">
                            <div class="avt">
                                <img src="<?=$IMG_URL?>/user/<?=$avatar?>" alt="">
                            </div>
                        </div>
                        <form action="index.php" class="form" method="POST">
                            <textarea name="cmt_content" id="" cols="30" rows="10" placeholder="Bạn có thắc mắc gì trong bài học này ?"></textarea>
                            <input type="hidden" value="<?=$course_id?>" name="id">
                            <input type="hidden" value="<?=$lesson_id?>" name="lesson_id">
                            <input type="submit" value="Gửi" name="lesson-comment">
                        </form>
                    </div>
                    <?php
                            $list_comment = comment_lesson_select_by_lesson($lesson_id);
                        if(count($list_comment) > 0){
                    ?>
                        <div class="comment-list">
                            <?php
                                foreach($list_comment as $cmt_key => $cmt_value){
                                    $cmt_user = user_select_by_id($cmt_value['username']);
                            ?>
                                <div class="item">
                                    <div class="avt">
                                        <img src="<?=$IMG_URL?>/user/<?=$cmt_user['avatar']?>" alt="">
                                    </div>
                                    <div class="detail">
                                        <div class="fullname"><?=$cmt_user['fullname']?></div>
                                        <p class="content"><?=$cmt_value['content']?></p>
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
                            if(isset($lesson_id)){
                                if($lesson_id == $value['lesson_id']){
                                    echo 'active';
                                }
                                else{
                                    echo '';
                                }
                            }
                            else if(isset($first_lesson)){
                                echo 'active';
                            }
                        ?>">
                            <a href="index.php?lesson&lesson_id=<?=$value['lesson_id']?>&id=<?=$course_id?>" class="lesson-title">
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
                                        <a href="index.php?quizz&id=<?=$value['quiz_id']?>&les_id=<?=$value['lesson_id']?>&course_id=<?=$course_id?>" class="num-quiz 
                                        <?php 
                                            $user_poin = select_user_poin($username, $value['quiz_id']);
                                            if($user_poin['poin'] == 10){
                                                echo 'done';
                                            }
                                            else{
                                                echo '';
                                            }
                                        ?>"><?=$key + 1?></a>
                                    <?php
                                        }
                                    ?>
                                </div>
                            <?php }?>
                            <div class="disable-bg"></div>
                        </div>
                    <?php
                        }
                        else if($key > 0){
                    ?>
                        <div class="lesson <?php 
                            if(isset($lesson_id)){
                                if($lesson_id == $value['lesson_id']){
                                    echo 'active ';
                                }
                                else{
                                    echo '';
                                }
                                $prev_lesson_id = $list_lesson[($key - 1)]['lesson_id'];
                                $list_qizz = quiz_select_by_lesson($prev_lesson_id);
                                $total = [];
                                foreach($list_qizz as $quiz_key => $quiz_value){
                                    $user_poin = select_user_poin($username, $quiz_value['quiz_id']);
                                    if($user_poin){
                                        array_push($total, $user_poin['poin']);
                                    }
                                }
                                $sum = array_sum($total);
                                if($sum / 10 == count($list_qizz)){
                                    echo 'unlock ';
                                }
                            }
                        ?>">
                            <a href="index.php?lesson&lesson_id=<?=$value['lesson_id']?>&id=<?=$course_id?>" class="lesson-title">
                                <?=($key + 1). '. '. $value['title']?>
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
                                    <a href="index.php?quizz&id=<?=$value['quiz_id']?>" class="num-quiz"><?=$key + 1?></a>
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