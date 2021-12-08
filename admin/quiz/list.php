<div class="admin__quiz">
    <div class="container">
        <div class="admin__quiz-list">
            <h2>Danh sách quiz</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Bài học</th>
                        <th>Câu hỏi</th>
                        <th>Đáp án 1</th>
                        <th>Đáp án 2</th>
                        <th>Đáp án 3</th>
                        <th>Đáp án đúng</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($list_quiz as $key => $value){
                            $lesson = lesson_select_by_id($value['lesson_id']);
                    ?>
                        <tr>
                            <td><?=$value['quiz_id']?></td>
                            <td><?=$lesson['title']?></td>
                            <td><?=$value['question']?></td>
                            <td><textarea type="text" readonly ><?=$value['answer_1']?> </textarea></td>
                            <td><textarea type="text" readonly ><?=$value['answer_2']?> </textarea></td>
                            <td><textarea type="text" readonly ><?=$value['answer_3']?> </textarea></td>
                            <td><textarea type="text" readonly ><?=$value['correct_answer']?> </textarea></td>
                            <td class="update">
                                <a href="index.php?update-quiz&quiz_id=<?=$value['quiz_id']?>">
                                    <i class="fas fa-tools"></i>
                                </a>
                            </td>
                            <td class="delete">
                                <a href="index.php?delete-quiz&quiz_id=<?=$value['quiz_id']?>" onclick="return confirm('Bạn chắc chắn muốn xóa quiz này ?')">
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
                    <a href="index.php?quiz-list&page_no=<?=$_SESSION['page_no'] > 0 ? $_SESSION['page_no'] - 1 : $max_page?>" class="btn-prev"><i class="fas fa-backward"></i></a>
                    <button disabled><?=$page_num + 1?></button>
                    <a href="index.php?quiz-list&page_no=<?=$_SESSION['page_no'] < $max_page ? $_SESSION['page_no'] + 1 : 0?>" class="btn-next"><i class="fas fa-forward"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>