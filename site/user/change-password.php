<div class="user">
    <div class="container">
        <div class="user__change-password">
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
            <h2>Đổi mật khẩu</h2>
            <form action="">
                <div class="label">
                    <p>Mật khẩu cũ</p>
                    <div class="input">
                        <input type="password" name="password1" placeholder="Nhập mật khẩu cũ" id="pass1">
                        <p class="err password1"><?=isset($mess_err) ? $mess_err : ''?></p>
                    </div>
                </div>
                <div class="label">
                    <p>Mật khẩu mới</p>
                    <div class="input">
                        <input type="password" name="password2" placeholder="Nhập mật khẩu mới" id="pass2" value="<?=isset($password2) ? $password2 : ''?>">
                        <p class="err password2"></p>
                    </div>
                </div>
                <div class="label">
                    <p>Nhập lại mật khẩu mới</p>
                    <div class="input">
                        <input type="password" name="password3" placeholder="Nhập lại mật khẩu mới" id="pass3" value="<?=isset($password3) ? $password3 : ''?>">
                        <p class="err password3"></p>
                    </div>
                </div>
                <input type="submit" name="btn-update-password" value="Đổi mật khẩu">
            </form>

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

                const arr = [
                    {
                        el: document.querySelector('#pass1'),
                        err: document.querySelector('.password1')
                    },
                    {
                        el: document.querySelector('#pass2'),
                        err: document.querySelector('.password2')
                    },
                    {
                        el: document.querySelector('#pass3'),
                        err: document.querySelector('.password3')
                    }
                ]

                arr.forEach(e => {
                    let err = e.err
                    e.el.onmouseout = (e) => {
                        let value = e.target.value.trim()
                        if(value == ''){
                            err.innerHTML = 'Chưa nhập dữ liệu'
                        }
                    }
                    e.el.onblur = (e) => {
                        let value = e.target.value.trim()
                        if(value == ''){
                            err.innerHTML = 'Chưa nhập dữ liệu'
                        }
                    }
                })
                arr.forEach((e, i) => {
                    let err = e.err
                    e.el.oninput = (e) => {
                        if(e.target.value.trim() != ''){
                            err.innerHTML = ''
                        }
                    }
                })

                let pass2 = arr[1].el
                let pass3 = arr[2].el
                pass3.onmouseout = () => {
                    if(pass3.value.trim() != pass2.value.trim()){
                        arr[2].err.innerHTML = 'Không trùng với mật khẩu mới'
                    }
                }
            </script>
        </div>
    </div>
</div>