<div class="login__form-sign-up">
    <h2>Đăng ký</h2>
    <?php
        if(strlen($MESSAGE) > 0){
    ?>
        <div class="message">
            <?=$MESSAGE?>
        </div>
    <?php
        }
    ?>
    <form action="index.php" method="POST" enctype="multipart/form-data">
        <div class="username">
            <div class="input">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Tên đăng nhập" name="username" id="username">
            </div>
            <div class="err username">
            </div>
        </div>
        <div class="fullname">
            <div class="input">
                <i class="fas fa-laugh-beam"></i>
                <input type="text" placeholder="Họ và tên" name="fullname" id="fullname">
            </div>
            <div class="err fullname"></div>
        </div>
        <div class="email">
            <div class="input">
                <i class="fas fa-envelope"></i>
                <input type="text" placeholder="Eg: abc@gmail.com" name="email" id="email">
            </div>
            <div class="err email"></div>
        </div>
        <div class="password">
            <div class="input">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Mật khẩu" name="password1" id="password1">
            </div>
            <div class="err password1"></div>
        </div>
        <div class="password2">
            <div class="input">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Nhập lại mật khẩu" name="password2" id="password2">
            </div>
            <div class="err password2"></div>
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

    <script>
        const arr = [
            {
                el: document.querySelector('#username'),
                err: document.querySelector('.err.username')
            },
            {
                el: document.querySelector('#fullname'),
                err: document.querySelector('.err.fullname')
            },
            {
                el: document.querySelector('#email'),
                err: document.querySelector('.err.email')
            },
            {
                el: document.querySelector('#password1'),
                err: document.querySelector('.err.password1')
            },
            {
                el: document.querySelector('#password2'),
                err: document.querySelector('.err.password2')
            }
        ]

        const validateEmail = (email) => {
            const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());
        }
        const validateFullname = (name) => {
            const re = /^[a-zA-Z ]+$/ ;
            return re.test(String(email).toLowerCase());
        }

        arr.forEach((e,i) => {
            let err = e.err
            e.el.onblur = (e) => {
                let value = e.target.value
                if(value == ''){
                    switch(i){
                        case 0:
                            err.innerHTML = 'Chưa nhập tên đăng nhập'
                            break;
                        case 1:
                            err.innerHTML = 'Chưa nhập họ và tên'
                            break;
                        case 2:
                            err.innerHTML = 'Chưa nhập email'
                            break;
                        case 3:
                            err.innerHTML = 'Chưa nhập mật khẩu'
                            break;
                        case 4:
                            err.innerHTML = 'Chưa xác nhận mật khẩu'
                            break;
                    }
                }
            }
        })

        arr.forEach(e => {
            let err = e.err
            e.el.oninput = (e) => {
                if(e.target.value != ''){
                    err.innerHTML = ''
                }
            }
        })

        arr[2].el.addEventListener('input',(e) => {
            let value = e.target.value
            let err = arr[2].err
            if(validateEmail(value) == false){
                err.innerHTML = 'Email không hợp lệ'
            }
        })
        arr[3].el.addEventListener('input',(e) => {
            let value = e.target.value
            let err = arr[3].err
            if(value.length > 16){
                err.innerHTML = 'Mật khẩu chứa tối đa 16 ký tự'
            }
        })
        arr[4].el.addEventListener('input',(e) => {
            let value = e.target.value
            let err = arr[4].err
            if(value != arr[3].el.value){
                err.innerHTML = 'Mật khẩu không khớp'
            }
        })
    </script>
</div>