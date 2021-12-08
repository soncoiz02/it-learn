<div class="admin__user">
    <div class="container">
        <div class="admin__user-update">
            <h2>Cập nhật thông tin người dùng</h2>
            <form action="index.php" class="form" method="POST" enctype="multipart/form-data">
                <div class="left">
                    <div class="label">
                        <p>Ảnh đại diện</p>
                        <div class="avt">
                            <img src="<?=$IMG_URL?>/user/<?=$avatar?>" alt="">
                        </div>
                        <label for="avt">Cập nhật ảnh</label>
                        <input type="file" name="avt" id="avt">
                        <input type="hidden" value="<?=$avatar?>" name="current_avt">
                    </div>
                </div>
                <div class="right">
                    <div class="label">
                        <p>Tên người dùng</p>
                        <input type="text" readonly name="username" value="<?=$username?>">
                    </div>
                    <div class="label">
                        <p>Họ và tên</p>
                        <input type="text" name="fullname" value="<?=$fullname?>" placeholder="Nhập họ và tên"> 
                    </div>
                    <div class="label">
                        <p>Email</p>
                        <input type="text" name="email" value="<?=$email?>" placeholder="Nhập email">
                    </div>
                    <div class="label">
                        <p>Phân quyền</p>
                        <div class="list">
                            <input type="radio" name="position" id="user" value="0" <?=$position == 0 ? 'checked': ''?>>
                            <label for="user">Người dùng</label> 
                            <input type="radio" name="position" id="admin" value="1" <?=$position == 1 ? 'checked': ''?>>
                            <label for="admin">Quản trị</label>
                        </div>
                    </div>
                    <input type="submit" value="Cập nhật" name="btn-update">
                </div>
            </form>
        </div>
    </div>
</div>