<div class="admin__course">
    <div class="container">
        <div class="admin__course-lesson">
            <h2>Thêm bài học</h2>
            <div class="list-course">
                <div class="head">
                    <div class="head-id">ID</div>
                    <div class="head-name">Tên khóa học</div>
                </div>
                <div class="list">
                    <?php
                        foreach($list_course as $key => $value){
                    ?>
                        <div class="item">
                            <div class="top">
                                <div class="detail">
                                    <div class="id"><?=$value['course_id']?></div>
                                    <div class="name"><?=$value['course_name']?></div>
                                </div>
                                <div class="btn">
                                    <div class="btn-drop">
                                        <i class="fas fa-chevron-circle-down"></i>
                                    </div>
                                    <a href="<?=$ADMIN_URL?>/course/?btn-add-lesson&course_id=<?=$value['course_id']?>" class="btn-add">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                            <?php
                                $list_lesson = lesson_select_by_course($value['course_id']);
                                if(count($list_lesson) > 0){
                            ?>
                                <div class="bottom">
                                    <?php
                                        foreach($list_lesson as $les_key => $les_value){
                                    ?>
                                        <div class="lesson">
                                            <div class="lesson-name"><?=($les_key + 1).'. '.$les_value['title']?></div>
                                            <div class="action">
                                                <a href="index.php?update-lesson&lesson_id=<?=$les_value['lesson_id']?>" class="btn-update">
                                                    <i class="fas fa-tools"></i>
                                                </a>
                                                <a href="index.php?delete-lesson&less_id=<?=$les_value['lesson_id']?>" class="btn-delete">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </div>
                                        </div>
                                    <?php
                                        }
                                    ?>                                   
                                </div>

                            <?php
                                }
                            ?>
                        </div>
                    <?php
                        }
                    ?>
                </div>
            </div>

            <script>
                const btnDrop = document.querySelectorAll('.btn-drop')
                const listEl = document.querySelectorAll('.bottom')
                for(let i = 0; i < btnDrop.length; i++){
                    btnDrop[i].onclick = () => {
                        listEl[i].classList.toggle('active')
                    }
                }
            </script>
        </div>
    </div>
</div>