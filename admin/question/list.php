<div class="admin__question">
    <div class="container">
        <div class="admin__question-list">
            <h2>Danh sách câu hỏi</h2>
            <table class="table" border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tác giả</th>
                        <th>Nội dung</th>
                        <th>Danh mục</th>
                        <th>Ngày đăng</th>
                        <th>Trả lời</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($list_ques as $key => $value){
                            $user = user_select_by_id($value['username']);
                            extract($user);
                    ?>
                        <tr>
                            <td><?=$value['ques_id']?></td>
                            <td><?=$username?> <span>(<?=$fullname?>)</span></td>
                            <td><?=$value['content']?></td>
                            <td><?=$value['tag']?></td>
                            <td><?=$value['date_ask']?></td>
                            <td><?=question_count_by_comment($value['ques_id'])?></td>
                            <td class="delete">
                                <a href="index.php?delete-ques&ques_id=<?=$value['ques_id']?>">
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