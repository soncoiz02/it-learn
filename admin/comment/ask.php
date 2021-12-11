<div class="admin__comment">
    <div class="container">
        <div class="admin__comment-ask">
            <h2>Thống kê câu trả lời</h2>
            <table class="table" border="1">
                <thead>
                    <tr>
                        <th>Câu hỏi</th>
                        <th>Tác giả</th>
                        <th>Số câu trả lời</th>
                        <th>Ngày hỏi</th>
                        <th>Chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($list_comment_question as $key => $value){
                            $user = user_select_by_id($value['username']);
                            extract($user);
                    ?>
                        <tr>
                            <td><?=$value['content']?></td>
                            <td><?=$username?><span> (<?=$fullname?>)</span> </td>
                            <td><?=$value['num']?></td>
                            <td><?=$value['date_ask']?></td>
                            <td class="detail">
                                <a href="index.php?detail-ask&ques_id=<?=$value['ques_id']?>">
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