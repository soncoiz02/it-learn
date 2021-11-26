<div class="login__form-sign-in">
    <h2>Đăng nhập</h2>
    <form action="index.php" method="POST">
        <div class="username">
            <div class="input">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Tên đăng nhập" name="username">
            </div>
        </div>
        <div class="password">
            <div class="input">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Mật khẩu" name="password">
            </div>
        </div>
        <input type="submit" class="btn-sign" value="Đăng nhập" name="btn-login">
    </form>
    <div class="question">
        <p class="forget-pass">Bạn quên mật khẩu ? <a href="">Tìm lại</a></p>
        <p class="sign-up">Bạn chưa có tài khoản ? <a href="?btn-register">Đăng ký</a></p>
    </div>
</div>