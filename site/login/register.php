<div class="login__form-sign-up">
    <h2>Đăng ký</h2>
    <form action="index.php" method="POST" enctype="multipart/form-data">
        <div class="username">
            <div class="input">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Tên đăng nhập" name="username">
            </div>
            <div class="err-mess">
                err
            </div>
        </div>
        <div class="fullname">
            <div class="input">
                <i class="fas fa-laugh-beam"></i>
                <input type="text" placeholder="Họ và tên" name="fullname">
            </div>
        </div>
        <div class="email">
            <div class="input">
                <i class="fas fa-envelope"></i>
                <input type="text" placeholder="Eg: abc@gmail.com" name="email">
            </div>
        </div>
        <div class="password">
            <div class="input">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Mật khẩu" name="password">
            </div>
        </div>
        <div class="password2">
            <div class="input">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Nhập lại mật khẩu" name="password2">
            </div>
        </div>
        <div class="upload-avt">
            <label for="avt">
                <i class="fas fa-file-image"></i>
                Chọn ảnh đại diện
            </label>
            <input type="file" id="avt" name="avatar">
        </div>
        <input type="submit" class="btn-sign" value="Đăng ký" name="btn-insert">
    </form>
</div>