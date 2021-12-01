<div class="login__form-sign-in">
    <h2>Đăng nhập</h2>
    <?php
        if(strlen($MESSAGE) > 0){
    ?>
        <div class="message"><?=$MESSAGE?></div>
    <?php
        }
    ?>
    <form action="index.php" method="POST">
        <div class="username">
            <div class="input">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Tên đăng nhập" name="username" id="username">
            </div>
            <div class="err username"></div>
        </div>
        <div class="password">
            <div class="input">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Mật khẩu" name="password" id="password">
            </div>
            <div class="err password"></div>
        </div>
        <input type="submit" class="btn-sign" value="Đăng nhập" name="btn-login">
    </form>
    <div class="question">
        <p class="sign-up">Bạn chưa có tài khoản ? <a href="?btn-register">Đăng ký</a></p>
    </div>
    <script>
        const arr = [
            {
                el: document.querySelector('#username'),
                err: document.querySelector('.err.username')
            },
            {
                el: document.querySelector('#password'),
                err: document.querySelector('.err.password')
            }
        ]

        arr.forEach((e, i) => {
            let err = e.err
            e.el.onblur = (e) => {
                let value = e.target.value.trim()
                if(value == ''){
                    if(i == 0){
                        err.innerHTML = 'Chưa nhập tên đăng nhập'
                    }
                    else if(i == 1){
                        err.innerHTML = 'Chưa nhập mật khẩu'
                    }
                }
            }
        })
        arr.forEach(e => {
            let err = e.err
            e.el.oninput = (e) => {
                let value = e.target.value.trim()
                if(value != ''){
                    err.innerHTML = ''
                }
            }
        })
    </script>
</div>