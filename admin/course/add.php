<div class="admin__course">
    <div class="container">
        <div class="admin__course-add">
            <h2>Thêm khóa học</h2>
            <form action="" class="form">
                <div class="form-left">
                    <label>
                        <p>ID khóa học</p>
                        <input type="text" name="course_id" readonly placeholder="Auto number">
                    </label>
                    <label>
                        <p>Tên khóa học</p>
                        <input type="text" name="course_name" placeholder="Tên khóa học">
                    </label>
                    <label class="course-tag">
                        <p>Chọn danh mục</p>
                        <div class="list-tag">
                            <input type="radio" name="course-tag" id="fe">
                            <label for="fe">Front-end</label>
                            <input type="radio" name="course-tag" id="be">
                            <label for="be">Back-end</label>
                            <input type="radio" name="course-tag" id="mb">
                            <label for="mb">Mobile</label>
                        </div>
                    </label>
                    <label>
                        <p>Ảnh đại diện</p>
                        <label for="img"  class="course-img">
                            <i class="fas fa-file-image"></i>
                            Tải ảnh lên
                        </label>
                        <input type="file" name="course-img" id="img">
                    </label>
                </div>
                <div class="form-right">
                    <label>
                        <p>Mô tả</p>
                        <textarea name="course-dsc" id="" cols="30" rows="10" placeholder="Viết mô tả"></textarea>
                    </label>
                    <input type="submit" value="Thêm mới" name="btn-add">
                </div>
            </form>
        </div>
    </div>
</div>