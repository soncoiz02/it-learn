<div class="admin__blog">
    <div class="container">
        <div class="admin__blog-list">
            <h2>Danh sách bài viết</h2>
            <table class="table" border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tiêu đề</th>
                        <th>Tác giả</th>
                        <th>Danh mục</th>
                        <th>Ngày đăng</th>
                        <th>Ảnh đại diện</th>
                        <th>Like</th>
                        <th>Chi tiết</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($list_blog as $key => $value){
                            $user = user_select_by_id($value['username']);
                            extract($user);
                    ?>
                        <tr>
                            <td><?=$value['blog_id']?></td>
                            <td><?=$value['title']?></td>
                            <td class="author"><?=$username?><span>(<?=$fullname?>)</span></td>
                            <td><?=$value['cate_id']?></td>
                            <td><?=$value['date']?></td>
                            <td>
                                <div class="img">
                                    <?php
                                        if($value['avatar'] != ''){
                                    ?>
                                        <img src="<?=$IMG_URL?>/blog/<?=$value['avatar']?>" alt="">
                                    <?php
                                        }
                                        else{
                                    ?>
                                        <img src="<?=$IMG_URL?>/else/cat-study.jpg" alt="">
                                    <?php
                                        }
                                    ?>
                                </div>
                            </td>
                            <td><?=blog_count_like($value['blog_id'])?></td>
                            <td class="detail">
                                <a href="index.php?detail-blog&blog_id=<?=$value['blog_id']?>">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                            <td class="delete">
                                <a href="index.php?delete-blog&blog_id=<?=$value['blog_id']?>" onclick="return confirm('Bạn chắc chắn muốn xóa bài viết này?')">
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