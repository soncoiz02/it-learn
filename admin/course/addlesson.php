<div class="admin__course">
    <div class="container">
        <div class="admin__course-addlesson">
            <h2><?=$course_name?></h2>
            <form action="" class="form">
                <div class="form-left">
                    <div class="label">
                        <p>Mã bài học</p>
                        <input type="text" placeholder="BH..." name="lesson_id">
                    </div>
                    <div class="label">
                        <p>Tiêu đề</p>
                        <input type="text" name="title" placeholder="Nhập tiêu đề">
                    </div>
                    <input type="hidden" name="course_id" value="<?=$course_id?>">
                    <input type="submit" value="Thêm" name="btn-insert-lesson">
                </div>
                <div class="form-right">
                    <div class="label">
                        <p>Link video</p>
                        <input type="text" name="vid_link" placeholder="Nhập link video">
                    </div>
                    <div class="label">
                        <p>Tài liệu</p>
                        <input type="file" name="doc_file" id="doc">
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

