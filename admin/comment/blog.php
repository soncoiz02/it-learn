<div class="admin__comment">
    <div class="container">
        <div class="admin__comment-ask">
            <h2>Thống kê bình luận</h2>
            <table class="table" border="1">
                <thead>
                    <tr>
                        <th>Tiêu đề</th>
                        <th>Tác giả</th>
                        <th>Số bình luận</th>
                        <th>Ngày viết</th>
                        <th>Chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($list_comment_blog as $key => $value){
                            $user = user_select_by_id($value['username']);
                            extract($user);
                    ?>
                        <tr>
                            <td><?=$value['title']?></td>
                            <td><?=$username?> (<?=$fullname?>)</td>
                            <td><?=blog_count_comment($value['blog_id'])?></td>
                            <td><?=$value['date']?></td>
                            <td class="detail">
                                <a href="">
                                    <i class="fas fa-eye"></i>
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