<div class="admin__course">
    <div class="container">
        <div class="admin__course-detail">
            <h2>Chi tiết: <?=$course_name?></h2>
            <div class="admin__course-detail-main">
                <div class="left">
                    <div class="cover">
                        <p>Ảnh đại diện</p>
                        <div class="img">
                            <img src="<?=$IMG_URL?>/course/<?=$course_img?>" alt="">
                        </div>
                    </div>
                    <div class="cover">
                        <p>Danh mục</p>
                        <div class="cate">
                            <?php
                                $cate = cate_select_by_id($cate_id);
                                extract($cate);
                                echo $cate_name;
                            ?>
                        </div>
                    </div>
                    <div class="cover">
                        <p>Mô tả</p>
                        <div class="dsc"><?=$course_dsc?></div>
                    </div>
                </div>
                <div class="right">
                    <p>Các bài học</p>
                    <ul class="list-lesson">
                        <?php
                            foreach($list_lesson as $key => $value){
                        ?>
                            <li>
                               <p><?=($key + 1).'. '.$value['title']?></p>
                               <a href="index.php?delete-lesson&less_id=<?=$value['lesson_id']?>&course_id=<?=$course_id?>"><i class="fas fa-trash-alt"></i></a>
                            </li>
                        <?php
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php
        if(strlen($MESSAGE)){
    ?>
        <div class="message <?=$type?>">
            <p>
                <?=$MESSAGE?>
            </p>
        </div>
    <?php
        }
    ?>
    <script>
        const mess = document.querySelector('.message')
        if(mess){
            setTimeout(() => {
                mess.remove()
            }, 3000)
        }
    </script>
</div>