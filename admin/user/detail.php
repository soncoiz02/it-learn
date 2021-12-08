<div class="admin__user">
    <div class="container">
        <div class="admin__user-list">
            <h2>Danh sách người dùng</h2>
            <table class="table" border="1">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Họ tên</th>
                        <th>Khóa học đăng ký</th>
                        <th>Tiến trình</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($list_course as $key => $value){
                    ?>
                        <tr>
                            <td><?=$username?></td>
                            <td><?=$fullname?></td>
                            <td><?=$value['course_name']?></td>
                            <td><?php
                                $count = 0;
                                $list_lesson = lesson_select_by_course($value['course_id']);
                                $total_lesson = count($list_lesson);
                                foreach($list_lesson as $lesson_key => $lesson_value){
                                    $list_quiz = quiz_select_by_lesson($lesson_value['lesson_id']);
                                    $total = [];
                                    foreach($list_quiz as $quiz_key => $quiz_value){
                                        $user_poin = select_user_poin($username, $quiz_value['quiz_id']);
                                        if($user_poin){
                                            array_push($total, $user_poin['poin']);
                                        }
                                    }
                                    $sum = array_sum($total);
                                    if($sum / 10 == count($list_quiz)){
                                        $count+=1;
                                    }
                                }
                                echo "$count/$total_lesson";
                            ?></td>
                        </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>