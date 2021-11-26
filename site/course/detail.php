<div class="courses">
    <div class="courses__detail">
        <div class="container">
            <div class="courses__detail-left">
                <h1><?=$detail_course['course_name']?></h1>
                <div class="dsc">
                    <h2>Mô tả</h2>
                    <span><?=$detail_course['course_dsc']?></span>
                </div>
                <div class="content">
                    <h2>Nội dung khóa học</h2>
                    <div class="list">
                        <?php
                           foreach($list_lesson as $key => $value){
                        ?>
                            <div class="item">
                                <?=($key + 1).'. '.$value['title']?>
                            </div>
                        <?php
                           }
                        ?>
                    </div>
                </div>
            </div>
            <div class="courses__detail-right">
                <div class="img">
                    <img src="" alt="">
                </div>
                <a href="" class="btn-sign">
                    Đăng ký khóa học
                </a>
                <ul class="detail">
                    <li>
                        <i class="fas fa-stopwatch"></i>
                        <?=$number_lesson?> bài học
                    </li>
                    <li>
                        <i class="fas fa-film"></i>
                        <?=$number_video?> video
                    </li>
                    <li>
                        <i class="fas fa-university"></i>
                        <?=$number_quizz?> câu quizz
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>