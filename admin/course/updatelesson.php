<div class="admin__course">
    <div class="container">
        <div class="admin__course-addlesson">
            <h2><?=$course_name?></h2>
            <form action="index.php" class="form" method="POST" enctype="multipart/form-data">
                <div class="form-left">
                    <div class="label">
                        <p>Mã bài học</p>
                        <input type="text" placeholder="BH..." name="lesson_id" value="<?=$lesson_id?>" readonly>
                    </div>
                    <div class="label">
                        <p>Tiêu đề</p>
                        <input type="text" name="title" placeholder="Nhập tiêu đề" value="<?=$title?>">
                    </div>
                    <input type="hidden" name="course_id" value="<?=$course_id?>">
                    <input type="submit" value="Cập nhật" name="btn-update-lesson">
                </div>
                <div class="form-right">
                    <div class="label">
                        <p>Link video</p>
                        <input type="text" name="vid_link" placeholder="Nhập link video" value="<?=$link_video?>">
                    </div>
                    <div class="label">
                        <p>Tài liệu</p>
                        <input type="file" name="doc_file" id="doc">
                        <input type="hidden" name="current_file" value="<?=$document?>">
                        <label for="doc"><i class="fas fa-file-alt"></i>File tài liệu</label>
                    </div>
                </div>
            </form>
            <script>
            </script>
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

