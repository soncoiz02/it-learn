<div class="admin__course">
    <div class="container">
        <div class="admin__course-add">
            <h2>Cập nhật khóa học</h2>
            <form action="index.php" class="form" method="POST" enctype="multipart/form-data">
                <div class="form-left">
                    <div class="label">
                        <p>ID khóa học</p>
                        <input type="text" name="course_id" readonly placeholder="Auto number" value="<?=$course_id?>">
                    </div>
                    <div class="label">
                        <p>Tên khóa học</p>
                        <input type="text" name="course_name" placeholder="Tên khóa học" value="<?=$course_name?>">
                    </div>
                    <div class="label">
                        <p>Chọn danh mục</p>
                        <div class="list-tag">
                            <?php
                                foreach($list_cate as $key => $value){
                            ?>
                                <input type="radio" name="course_tag" id="c<?=$value['cate_id']?>" value="<?=$value['cate_id']?>" <?=$cate_id == $value['cate_id'] ? 'checked' : ''?>>
                                <label for="c<?=$value['cate_id']?>"><?=$value['cate_name']?></label>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                    <div class="label">
                        <p>Ảnh đại diện</p>
                        <div class="current-img">
                            <img src="<?=$IMG_URL?>/course/<?=$course_img?>" alt="">
                            <input type="hidden" name="img" value="<?=$course_img?>">
                        </div>
                        <label for="img"  class="course-img">
                            <i class="fas fa-file-image"></i>
                            Tải ảnh lên
                        </label>
                        <input type="file" name="course_img" id="img">
                    </div>
                </div>
                <div class="form-right">
                    <div class="label">
                        <p>Mô tả</p>
                        <textarea name="course_dsc" cols="30" rows="10" placeholder="Viết mô tả"><?=$course_dsc?></textarea>
                    </div>
                    <input type="submit" value="Cập nhật" name="btn-update">
                </div>
            </form>
            <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
            <script>
                CKEDITOR.replace( 'course_dsc' );
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