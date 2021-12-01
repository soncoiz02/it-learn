<div class="admin__user">
    <div class="container">
        <div class="admin__user-list">
            <h2>Danh sách người dùng</h2>
            <table class="table" border="1">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Họ tên</th>
                        <th>Email</th>
                        <th>Ảnh đại diện</th>
                        <th>Phân quyền</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($list_user as $key => $value){
                    ?>
                    <tr>
                        <td><?=$value['username']?></td>
                        <td><?=$value['fullname']?></td>
                        <td><?=$value['email']?></td>
                        <td>
                            <div class="img">
                                <img src="<?=$IMG_URL?>/user/<?=$value['avatar']?>" alt="">
                            </div>
                        </td>
                        <td><?=$value['position'] = 1 ? 'Quản trị' : 'Học viên'?></td>
                        <td class="update">
                            <a href="">
                                <i class="fas fa-tools"></i>
                            </a>
                        </td>
                        <td class="delete">
                            <a href="index.php?delete-user&user_id=<?=$value['username']?>">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
            <div class="pagination">
                <div class="list-btn">
                    <a href="" class="btn-prev"><i class="fas fa-backward"></i></a>
                    <button disabled>1</button>
                    <a href="" class="btn-next"><i class="fas fa-forward"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>