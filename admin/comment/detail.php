<div class="admin__comment">
    <div class="container">
        <div class="admin__comment-ask">
            <h2><?=$detail_title?></h2>
            <table class="table" border="1">
                <thead>
                    <tr>
                        <th>Tác giả</th>
                        <th>Nội dung</th>
                        <th>Ngày đăng</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($list_comment as $key => $value){
                            $user = user_select_by_id($value['username']);
                            extract($user);
                    ?>
                        <tr>
                            <td><?=$value['username']?> (<?=$fullname?>)</td>
                            <td><?=$value['content']?></td>
                            <td><?=$value['date']?></td>
                            <td class="delete">
                                <a href="index.php?delete-cmt&cmt_id=<?=$value['id']?>&<?php 
                                    if(isset($blog_id)){
                                        echo "cmt-blog&blog_id=$blog_id";
                                    }
                                    else if(isset($ques_id)){
                                        echo "cmt-ques&ques_id=$ques_id";
                                    }
                                    else if(isset($lesson_id)){
                                        echo "cmt-lesson&lesson_id=$lesson_id";
                                    }
                                ?>" onclick="return confirm('Bạn chắc chắn muốn xóa bình luận này?')">
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