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
                            <div class="detail">
                                <div class="id"><?=$value['course_id']?></div>
                                <div class="name"><?=$value['course_name']?></div>
                            </div>
                            <a href="<?=$ADMIN_URL?>/course/?btn-add-lesson&course_id=<?=$value['course_id']?>" class="btn-add">
                                <i class="fas fa-plus"></i>
                            </a>
                        </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>