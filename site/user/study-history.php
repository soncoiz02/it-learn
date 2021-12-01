<div class="user">
    <div class="container">
        <div class="user__history-study">
            <h2>Lịch sử học</h2>
            <?php
                if(count($list_course) > 0){
            ?>
            <div class="list-course">
                <?php
                    foreach($list_course as $key => $value){
                ?>
                    <div class="item">
                        <div class="img">
                            <img src="<?=$IMG_URL?>/course/<?=$value['course_img']?>" alt="">
                        </div>
                        <div class="detail">
                            <p class="name"><?=$value['course_name']?></p>
                            <p class="status">Trạng thái: <span>Đang học</span></p>
                        </div>
                        <div class="progress">
                            Tiến trình: 
                            <span>
                            <?php
                                $count = 0;
                                $list_lesson = lesson_select_by_course($value['course_id']);
                                $total_lesson = count($list_lesson);
                                foreach($list_lesson as $lesson_key => $lesson_value){
                                    $list_quiz = quiz_select_by_lesson($lesson_value['lesson_id']);
                                    $total = [];
                                    foreach($list_quiz as $quiz_key => $quiz_value){
                                        $user_poin = select_user_poin($username, $quiz_value['quiz_id']);
                                        if($user_poin){
                                            array_push($total, $user_poin['poin']);
                                        }
                                    }
                                    $sum = array_sum($total);
                                    if($sum / 10 == count($list_quiz)){
                                        $count+=1;
                                    }
                                }
                                echo "$count/$total_lesson";
                            ?>
                            </span>
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
                <div class="message">
                    <div class="img">
                        <img src="<?=$IMG_URL?>/else/cat-study.jpg" alt="">
                    </div>
                    <p>Bạn chưa đăng ký khóa học nào. <a href="<?=$SITE_URL?>/course?btn-list">Đăng ký ngay</a></p>
                </div>
            <?php
                }
            ?>
        </div>
    </div>
</div>