<div class="admin__dashboard">
    <div class="container">
        <div class="admin__dashboard-top">
            <div class="label">
                <p class="cap"><i class="fas fa-users"></i> Tổng người dùng</p>
                <p class="total"><?=$total_user?></p>
                <p class="change"><span>+ <?=$count_user?></span> Hôm nay</p>
            </div>
            <div class="label">
                <p class="cap"><i class="fas fa-newspaper"></i> Tổng bài viết</p>
                <p class="total"><?=$total_blog?></p>
                <p class="change"><span>+ <?=$count_blog?></span> Hôm nay</p>
            </div>
            <div class="label">
                <p class="cap"><i class="fas fa-question-circle"></i> Tổng câu hỏi</p>
                <p class="total"><?=$total_question?></p>
                <p class="change"><span>+ <?=$count_question?></span> Hôm nay</p>
            </div>
        </div>
        <div class="admin__dashboard-main">
            <div class="left">
                <div class="list-lastest-blog">
                    <h2>Bài viết mới nhất</h2>
                    <table border="1">
                        <tr>
                            <th>Người đăng</th>
                            <th>Tiêu đề</th>
                            <th>Ngày đăng</th>
                        </tr>
                        <?php
                            $list_blog = select_lastest_blog($today, $day_ago);
                            foreach($list_blog as $blog_key => $blog_value){
                                $user = user_select_by_id($blog_value['username'])
                        ?>
                            <tr>
                                <td><?=$user['fullname']?> (<?=$blog_value['username']?>)</td>
                                <td><?=$blog_value['title']?></td>
                                <td><?=$blog_value['date']?></td>
                            </tr>
                        <?php
                            }
                        ?>
                    </table>
                </div>
                <div class="list-lastest-blog">
                    <h2>Câu hỏi mới nhất</h2>
                    <table border="1">
                        <tr>
                            <th>Người đăng</th>
                            <th>Câu hỏi</th>
                            <th>Ngày đăng</th>
                        </tr>
                        <?php
                            $list_question = select_lastest_question($today, $day_ago);
                            foreach($list_question as $ques_key => $ques_value){
                                $user = user_select_by_id($ques_value['username'])
                        ?>
                            <tr>
                                <td><?=$user['fullname']?> (<?=$ques_value['username']?>)</td>
                                <td><?=$ques_value['content']?></td>
                                <td><?=$ques_value['date_ask']?></td>
                            </tr>
                        <?php
                            }
                        ?>
                    </table>
                </div>
            </div>
            <div class="right">
                <div class="blog-chart">
                    <h2>Thống kê bài viết theo danh mục</h2>
                    <canvas id="blogChart"></canvas>
                </div>
                <div class="blog-chart">
                    <h2>Thống kê câu hỏi theo danh mục</h2>
                    <canvas id="quesChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <script>
        function createBlogChart(){
            const ctx = document.getElementById('blogChart').getContext('2d')
            const blogChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: [<?php
                            foreach($list_cate as $key => $value){
                            ?>'<?=$value['cate_name']?>',<?php
                            }
                        ?>],
                    datasets: [{
                        label: 'My First Dataset',
                        data: [<?php foreach($list_blog_data as $blog_data_value){echo "$blog_data_value,";}?>],
                        backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)',
                        'rgb(124, 185, 232)',
                        'rgb(38, 230, 0)',
                        'rgb(255,128,0)',
                        'rgb(212,0,255)',
                        'rgb(255,77,166)',
                        'rgb(0,204,204)',
                        'rgb(255,85,51)'
                        ],
                        hoverOffset: 4
                    }]
                }
            })
        }
        function createQuestionChart(){
            const ctx = document.getElementById('quesChart').getContext('2d')
            const blogChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: [<?php
                            foreach($list_cate as $key => $value){
                            ?>'<?=$value['cate_name']?>',<?php
                            }
                        ?>],
                    datasets: [{
                        label: 'My First Dataset',
                        data: [<?php foreach($list_ques_data as $ques_data_value){echo "$ques_data_value,";}?>],
                        backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)',
                        'rgb(124, 185, 232)',
                        'rgb(38, 230, 0)',
                        'rgb(255,128,0)',
                        'rgb(212,0,255)',
                        'rgb(255,77,166)',
                        'rgb(0,204,204)',
                        'rgb(255,85,51)'
                        ],
                        hoverOffset: 4
                    }]
                }
            })

        }
        createQuestionChart()
        createBlogChart()
    </script>
</div>