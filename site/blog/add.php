<div class="blogs">
    <div class="blogs__add">
        <div class="container">
            <h2>Tạo bài viết</h2>
            <form action="" class="form">
                <div class="form-left">
                    <input type="text" placeholder="Tiêu đề bài viết">
                    <p>Nội dung</p>
                    <textarea name="blog_content" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="form-right">
                    <div class="avt-upload">
                        <h2>Ảnh đại diện</h2>
                        <label for="img">
                            <i class="fas fa-file-image"></i>
                        </label>
                        <input type="file" id="img" name="img">
                    </div>
                    <div class="list-tag">
                        <h2>Tag</h2>
                        <div class="list">
                            <input type="checkbox" id="tag1">
                            <label for="tag1">Tag</label>
                            <input type="checkbox" id="tag2">
                            <label for="tag2">Tag</label>
                            <input type="checkbox" id="tag3">
                            <label for="tag3">Tag</label>
                        </div>
                    </div>
                    <input type="submit" value="Đăng" name="btn-add">
                </div>
            </form>
        </div>
        <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace( 'blog_content' );
        </script>
    </div>
</div>