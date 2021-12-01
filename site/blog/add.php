<div class="blogs">
    <div class="blogs__add">
        <div class="container">
        <?php
                if(strlen($MESSAGE) > 0){
            ?>
                <div class="message <?=$type?>">
                    <div class="icon">
                        <i class="fas fa-check"></i>
                        <i class="fas fa-times"></i>
                    </div>
                    <p><?=$MESSAGE?></p>
                </div>
            <?php
                }
            ?>
            <h2>Tạo bài viết</h2>
            <form action="index.php" class="form" method="POST" enctype="multipart/form-data">
                <div class="form-left">
                    <input type="text" placeholder="Tiêu đề bài viết" name="title">
                    <p>Nội dung</p>
                    <textarea name="blog_content" cols="30" rows="10"></textarea>
                </div>
                <div class="form-right">
                    <div class="avt-upload">
                        <h2>Ảnh đại diện</h2>
                        <label for="img">
                            <i class="fas fa-file-image"></i>
                        </label>
                        <input type="file" id="img" name="blog_img">
                    </div>
                    <div class="list-tag">
                        <h2>Tag</h2>
                        <div class="list">
                            <?php
                                foreach($list_cate as $key => $value){
                            ?>
                            <div class="tag">
                                <input type="checkbox" name="tag[]" id="tag<?=$value['cate_id']?>" value="<?=$value['cate_name']?>">
                                <label for="tag<?=$value['cate_id']?>"><?=$value['cate_name']?></label>
                            </div>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                    <input type="submit" value="Đăng" name="insert-blog">
                </div>
            </form>
        </div>
        <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
        <script>
            <?php 
                    if(strlen($MESSAGE) > 0){
                ?>
                    setTimeout(() => {
                        document.querySelector('.message').style.display = 'none'
                    }, 3000)
                <?php
                    }
                ?>
            CKEDITOR.replace( 'blog_content' );
        </script>
    </div>
</div>