<div class="user">
    <div class="container">
        <div class="user__setting">
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
            <h2>Cài đặt tài khoản</h2>
            <form action="index.php" method="POST" enctype="multipart/form-data">
                <div class="left">
                    <div class="label">
                        <p>Ảnh đại diện</p>
                        <div class="avatar">
                            <img src="<?=$IMG_URL?>/user/<?=$avatar?>" alt="" id="img">
                        </div>
                        <label for="avt">
                            Cập nhật ảnh đại diện <i class="fas fa-upload"></i>
                        </label>
                        <input type="file" name="new_avt" id="avt">
                        <input type="hidden" name="avt" value="<?=$avatar?>">
                    </div>
                </div>
                <div class="right">
                    <div class="label">
                        <p>Họ và tên</p>
                        <div class="input">
                            <input type="text" placeholder="Nhập họ tên" value="<?=$fullname?>" name="fullname" class="user-fullname">
                            <p class="err fullname"></p>
                        </div>
                    </div>
                    <div class="label">
                        <p>Email</p>
                        <div class="input">
                            <input type="text" placeholder="Nhập email" value="<?=$email?>" name="email" class="user-email">
                            <p class="err email"></p>
                        </div>
                    </div>
                    <input type="submit" value="Cập nhật" name="btn-update">
                </div>
            </form>
            <script>
                const imgInput = document.querySelector('#avt')
                imgInput.onchange = (e) => {
                    const img = document.querySelector('#img')
                    img.src = URL.createObjectURL(e.target.files[0])
                    img.onload = () => {
                        URL.revokeObjectURL(img.src)
                    }
                }

                const arr = [
                    {
                        el: document.querySelector('.user-fullname'),
                        err: document.querySelector('.err.fullname')
                    },
                    {
                        el: document.querySelector('.user-email'),
                        err: document.querySelector('.err.email')
                    }
                ]

                arr.forEach(e => {
                    let err = e.err
                    e.el.onblur = (e) => {
                        let value = e.target.value
                        if(value == ''){
                            err.innerHTML = 'Chưa nhập dữ liệu'
                        }
                    }
                })
                const validateEmail = (email) => {
                    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                    return re.test(String(email).toLowerCase());
                }

                arr[1].el.addEventListener('input',(e) => {
                    let value = e.target.value
                    let err = arr[1].err
                    if(value != ''){
                        err.innerHTML = ''
                    }
                    if(validateEmail(value) == false){
                        err.innerHTML = 'Không đúng định dạng abc@gmail.com'
                    }
                })

                <?php 
                    if(strlen($MESSAGE) > 0){
                ?>
                    setTimeout(() => {
                        document.querySelector('.message').style.display = 'none'
                    }, 3000)
                <?php
                    }
                ?>
            </script>
        </div>
    </div>
</div>