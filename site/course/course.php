<div class="courses">
    <?php
        if(isset($_SESSION['user'])){
            $courses_signed = course_select_by_user($_SESSION['user']['username']);
            if(count($courses_signed) > 0){
    ?>
        <section class="courses__signed">
            <div class="container">
                <h2 class="title">Khóa học đã đăng ký</h2>
                <div class="list-courses">
                    <?php
                        foreach($courses_signed as $key => $value){
                    ?>
                        <div class="course-item">
                            <div class="img">
                                <img src="<?=$IMG_URL?>/course/<?=$value['course_img']?>" alt="">
                            </div>
                            <a href="index.php?first-lesson&id=<?=$value['course_id']?>" class="name">
                                <?=$value['course_name']?>
                            </a>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </section>
    <?php
            }
        }
    ?>
    <?php
        if(count($courses_basic) > 0){
    ?>
        <section class="courses__basic">
            <div class="container">
                <h2 class="title">Khóa học cơ bản</h2>
                <div class="list-courses">
                    <?php
                        foreach($courses_basic as $key => $value){
                    ?>
                        <div class="course-item">
                            <div class="img">
                                <img src="<?=$IMG_URL?>/course/<?=$value['course_img']?>" alt="">
                            </div>
                            <a href="index.php?detail-course&id=<?=$value['course_id']?>" class="name">
                                <?=$value['course_name']?>
                            </a>
                            <div class="user-count">
                                <i class="fas fa-users"></i>
                                <span><?=number_format(course_count_user($value['course_id']))?></span>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </section>
    <?php
        }
    ?>
    <?php
        if(count($courses_front) > 0){
    ?>
    <section class="courses__front-end">
        <div class="container">
            <h2 class="title">Khóa học Front-end</h2>
            <div class="list-courses">
                <?php
                    foreach($courses_front as $key => $value){
                ?>
                    <div class="course-item">
                        <div class="img">
                            <img src="<?=$IMG_URL?>/course/<?=$value['course_img']?>" alt="">
                        </div>
                        <a href="index.php?detail-course&id=<?=$value['course_id']?>" class="name">
                            <?=$value['course_name']?>
                        </a>
                        <div class="user-count">
                            <i class="fas fa-users"></i>
                            <span><?=number_format(course_count_user($value['course_id']))?></span>
                        </div>
                    </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </section>
    <?php
        }
    ?>
    <?php
        if(count($courses_back) > 0){
    ?>
        <section class="courses__back-end">
            <div class="container">
                <h2 class="title">Khóa học Back-end</h2>
                <div class="list-courses">
                    <?php
                        foreach($courses_back as $key => $value){
                    ?>
                        <div class="course-item">
                            <div class="img">
                                <img src="<?=$IMG_URL?>/course/<?=$value['course_img']?>" alt="">
                            </div>
                            <a href="index.php?detail-course&id=<?=$value['course_id']?>" class="name">
                                <?=$value['course_name']?>
                            </a>
                            <div class="user-count">
                                <i class="fas fa-users"></i>
                                <span><?=number_format(course_count_user($value['course_id']))?></span>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </section>
    <?php
        }
    ?>
    
</div>