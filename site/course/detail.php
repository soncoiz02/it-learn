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
                    <img src="<?=$IMG_URL?>/course/<?=$detail_course['course_img']?>" alt="">
                </div>
                <div class="btn-sign">
                    Đăng ký khóa học
                </div>
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
        <div class="alert-login">
            <div class="box">
                <div class="btn-close-alert"><i class="fas fa-times"></i></div>
                <div class="img">
                    <img src="<?=$IMG_URL?>/else/lucky-cat.jpg" alt="">
                </div>
                <p>Bạn phải đăng nhập để đăng ký khóa học.</p>
                <a href="<?=$SITE_URL?>/login">Đăng nhập</a>
            </div>
        </div>

        <script>
            const btnSign = document.querySelector('.btn-sign')
            const alertBox = document.querySelector('.alert-login')
            const btnClose = document.querySelector('.btn-close-alert')
            
            console.log(btnClose)
            btnClose.onclick = () => {
                alertBox.classList.remove('active')
            }
            
            const condition = <?php if(isset($_SESSION['user'])){
                echo '1';
            }
            else {
                echo '0';
            }   ?>

            btnSign.onclick = () => {
                if(condition == 1){
                    window.location.assign('index.php?course-sign&course_id=<?=$detail_course['course_id']?>')
                }
                else if(condition == 0){
                    alertBox.classList.add('active')
                }
            }
        </script>
    </div>
</div>