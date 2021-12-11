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
                ?>
                    <div class="item">
                        <div class="img">
                            <img src="<?=$IMG_URL?>/course/<?=$value['course_img']?>" alt="">
                        </div>
                        <div class="detail">
                        <a href="<?=$SITE_URL?>/course/?first-lesson&id=<?=$value['course_id']?>" class="name">
                            <?=$value['course_name']?>
                        </a>
                        <?php 
                            if($count == $total_lesson){
                        ?>
                                <p class="status">Trạng thái: <span  style="color: #1ebc1e;">Hoàn thành</span></p>
                        <?php
                            } 
                            else{
                        ?>
                                <p class="status">Trạng thái: <span>Đang học</span></p>
                        <?php
                            }                               
                        ?>
                        </div>
                        <div class="progress">
                            Tiến trình: 
                            <span>
                            <?="$count/$total_lesson"?>
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