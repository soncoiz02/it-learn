<div class="ask">
    <div class="container">
        <div class="ask__list">
            <ul class="ask__list-nav">
                <li class="ask__list-nav-link"><a href="index.php?list-ques">Tất cả câu hỏi</a></li>
                <li class="ask__list-nav-link active"><a href="index.php?my-ask">Câu hỏi của bạn</a></li>
            </ul>
            <?php
                if(strlen($MESSAGE) > 0){
            ?>
                <div class="message <?=$type?>">
                    <div class="icon">
                        <i class="fas fa-check"></i>
                        <i class="fas fa-times"></i>
                    </div>
                    <p><?=$MESSAGE?></p>
                </div>
            <?php
                }
            ?>
            <?php
                if(count($list_question) > 0){
            ?>
            <div class="ask__list-list">
                <?php 
                    $today = date("Y-m-d");
                    foreach($list_question as $key => $value){
                ?>
                    <div class="ask__list-list-item">
                        <div class="top">
                            <div class="user">
                                <div class="avt">
                                    <img src="<?=$IMG_URL?>/user/<?=$avatar?>" alt="">
                                </div>
                                <div class="detail">
                                    <div class="fullname"><?=$fullname?></div>
                                    <div class="username">@<?=$username?></div>
                                </div>
                            </div>
                            <a href="index.php?btn-delete&ques_id=<?=$value['ques_id']?>" class="delete-btn">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </div>
                        <div class="main-content">
                            <a href="index.php?detail-ques&ques_id=<?=$value['ques_id']?>" class="content"><?=$value['content']?></a>
                        </div>
                        <div class="list-tag">
                            <?php
                                $list_tag = explode(', ', $value['tag']);
                                foreach($list_tag as $tag_value){
                                    if($tag_value != ''){
                            ?>
                                <p class="tag"><?=$tag_value?></p>
                            <?php
                                    }
                                }
                            ?>
                        </div>
                        <div class="bottom">
                            <div class="day-left">
                                <?php
                                    $date = handle_date($today, $value['date_ask']);
                                    $month = floor($date / 30);
                                    if($month > 0){
                                        echo "$month tháng trước";
                                    }
                                    else if($date == 0){
                                        echo "Hôm nay";
                                    }
                                    else{
                                        echo "$date ngày trước";
                                    }
                                ?></div>
                            <div class="answer-count"><?=question_count_by_comment($value['ques_id'])?> trả lời</div>
                        </div>
                    </div>
                <?php
                    }
                ?>
            </div>
        <?php 
            }
            else{
        ?>
        <div class="blogs__list-error">
            <div class="img">
                <img src="<?=$IMG_URL?>/else/cat-sleep2.jpg" alt="">
            </div>
            <p>Chưa có câu hỏi nào được đăng.</p>
        </div>
        <?php
            }
        ?>
        <div class="active-btn">
            <i class="fas fa-plus"></i>
        </div>
        <script>
            <?php 
                    if(strlen($MESSAGE) > 0){
                ?>
                    setTimeout(() => {
                        document.querySelector('.message').style.display = 'none'
                    }, 3000)
                <?php
                    }
                ?>
        </script>
        </div>
        <?php
            if(isset($_SESSION['user'])){
        ?>
            <div class="ask__add">
                <div class="prev-btn">
                    <i class="fas fa-angle-double-left"></i><i class="fas fa-angle-double-left"></i>
                </div>
                <h2 class="ask__add-title">Đặt câu hỏi</h2>
                <form action="index.php" class="ask__add-form" method="POST">
                    <textarea name="" id="" cols="30" rows="10" placeholder="Viết câu hỏi của bạn"></textarea>
                    <div class="list-tag">
                        <?php
                            $list_tag = cate_select_all();
                            foreach($list_tag as $key => $value){
                        ?>
                            <div class="tag">
                                <input type="checkbox" name="tag[]" id="tag<?=$value['cate_id']?>" value="<?=$value['cate_name']?>">
                                <label for="tag<?=$value['cate_id']?>"><?=$value['cate_name']?></label>
                            </div>
                        <?php
                            }
                        ?>
                    </div>
                    <input type="submit" class="send-btn" value="Gửi">
                </form>
            </div>
        <?php
            }
        ?>
    </div>
</div>