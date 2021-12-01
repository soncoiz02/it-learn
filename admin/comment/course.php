<div class="admin__comment">
    <div class="container">
        <div class="admin__comment-ask">
            <h2>Thống kê bình luận</h2>
            <table class="table" border="1">
                <thead>
                    <tr>
                        <th>Khóa học</th>
                        <th>Bài học</th>
                        <th>Số bình luận</th>
                        <th>Chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($list_comment_lesson as $key => $value){
                    ?>
                        <tr>
                            <td><?=$value['course_name']?></td>
                            <td><?=$value['title']?></td>
                            <td><?=$value['total']?></td>
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