<div class="admin__comment">
    <div class="container">
        <div class="admin__comment-ask">
            <h2>Chi tiết: <?=$detail_ques['content']?></h2>
            <table class="table" border="1">
                <thead>
                    <tr>
                        <th>Tác giả</th>
                        <th>Nội dung</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($list_comment as $key => $value){
                    ?>
                        <tr>
                            <td><?=$value['username']?></td>
                            <td><?=$value['content']?></td>
                            <td class="delete">
                                <a href="">
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