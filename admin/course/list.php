<div class="admin__course">
    <div class="container">
        <div class="admin__course-list">
            <h2>Danh sách khóa học</h2>
            <table class="table" border="1">
                <thead>
                    <tr>
                        <th class="title-id">ID</th>
                        <th class="title-name">Tên khóa học</th>
                        <th class="title-tag">Danh mục</th>
                        <th class="title-img">Ảnh đại diện</th>
                        <th class="title-number">Số bài học</th>
                        <th class="title-detail">Chi tiết</th>
                        <th class="title-update">Sửa</th>
                        <th class="title-delete">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($list_course as $key => $value){
                    ?>
                        <tr>
                            <td class="id"><?=$value['course_id']?></td>
                            <td class="name"><?=$value['course_name']?></td>
                            <td class="tag"><?php $cate = cate_select_by_id($value['cate_id']); echo $cate['cate_name'];?></td>
                            <td>
                                <div class="img">
                                    <img src="" alt="">
                                </div>
                            </td>
                            <td class="number"><?=lesson_count($value['course_id'])?></td>
                            <td class="detail">
                                <a href="index.php?detail-course&course_id=<?=$value['course_id']?>">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                            <td class="update">
                                <a href="index.php?update-course&course_id=<?=$value['course_id']?>">
                                    <i class="fas fa-tools"></i>
                                </a>
                            </td>
                            <td class="delete">
                                <a href="index.php?btn-delete&course_id=<?=$value['course_id']?>" onclick="return confirm('Bạn chắc chắn muốn xóa bài học này?')">
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