<div class="ask">
    <div class="container">
        <div class="ask__detail">
            <div class="top">
                <?php
                    $author = user_select_by_id($username);
                    extract($author);
                ?>
                <div class="user">
                    <div class="avt">
                        <img src="<?=$IMG_URL?>/user/<?=$avatar?>" alt="">
                    </div>
                    <div class="detail">
                        <div class="fullname"><?=$fullname?></div>
                        <div class="username">@<?=$username?></div>
                    </div>
                </div>
                <p class="question"><?=$content?></p>
                <div class="list-tag">
                    <?php
                        $list_tag = explode(', ', $tag);
                        foreach($list_tag as $tag_value){
                    ?>
                        <div class="tag"><?=$tag_value?></div>
                    <?php
                        }
                    ?>
                </div>
            </div>
            <div class="comment">
                <h2><?=$number_ques?> câu trả lời</h2>
                <?php
                    if(isset($_SESSION['user'])){
                ?>
                    <div  div class="comment-form">
                        <div class="avt">
                            <img src="<?=$IMG_URL?>/user/<?=$avatar?>" alt="">
                        </div>
                        <form action="index.php" class="form" method="POST">
                            <textarea name="comment" id="" cols="30" rows="10" placeholder="Viết câu trả lời của bạn"></textarea>
                            <input type="hidden" name="ques_id" value="<?=$ques_id?>">
                            <input type="submit" value="Gửi" name="btn-send-cmt">
                        </form>
                    </div>
                <?php
                    }
                ?>
                <?php
                    if(count($list_comment) > 0){
                ?>
                    <div class="comment-list">
                        <?php
                            foreach($list_comment as $cmt_key => $cmt_value){
                                $other_user = user_select_by_id($cmt_value['username']);
                                extract($other_user);
                        ?>
                            <div class="item">
                                <div class="avt">
                                    <img src="<?=$IMG_URL?>/user/<?=$avatar?>" alt="">
                                </div>
                                <div class="detail">
                                    <p class="fullname"><?=$fullname?></p>
                                    <p class="cmt"><?=$cmt_value['content']?></p>
                                </div>
                            </div>
                        <?php
                            }
                        ?>
                    </div>
                <?php
                    }
                ?>
            </div>
            <div class="active-btn">
                <i class="fas fa-plus"></i>
            </div>
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
