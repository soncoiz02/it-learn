<div class="ask">
    <div class="container">
        <div class="ask__detail">
            <div class="top">
                <div class="user">
                    <div class="avt">
                        <img src="" alt="">
                    </div>
                    <div class="detail">
                        <div class="fullname">Fullname</div>
                        <div class="username">@username</div>
                    </div>
                </div>
                <p class="question">Thời gian tự học và học ở ngoài như thế nào ?</p>
                <div class="list-tag">
                    <div class="tag">Tag</div>
                    <div class="tag">Tag</div>
                </div>
            </div>
            <div class="comment">
                <h2>120 câu trả lời</h2>
                <?php
                    if(isset($_SESSION['user'])){
                ?>
                    <div  div class="comment-form">
                        <div class="avt">
                            <img src="" alt="">
                        </div>
                        <form action="" class="form">
                            <textarea name="" id="" cols="30" rows="10" placeholder="Viết câu trả lời của bạn"></textarea>
                            <input type="submit" value="Gửi" name="">
                        </form>
                    </div>
                <?php
                    }
                ?>
                <div class="comment-list">
                    <div class="item">
                        <div class="avt">
                            <img src="" alt="">
                        </div>
                        <div class="detail">
                            <p class="fullname">Fullname</p>
                            <p class="cmt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit ab totam excepturi sequi, omnis quod dolores quaerat enim rem distinctio hic praesentium sit illo? Totam, omnis nostrum? Eaque, praesentium quae.</p>
                        </div>
                    </div>
                    <div class="item">
                        <div class="avt">
                            <img src="" alt="">
                        </div>
                        <div class="detail">
                            <p class="fullname">Fullname</p>
                            <p class="cmt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit ab totam excepturi sequi, omnis quod dolores quaerat enim rem distinctio hic praesentium sit illo? Totam, omnis nostrum? Eaque, praesentium quae.</p>
                        </div>
                    </div>
                    <div class="item">
                        <div class="avt">
                            <img src="" alt="">
                        </div>
                        <div class="detail">
                            <p class="fullname">Fullname</p>
                            <p class="cmt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit ab totam excepturi sequi, omnis quod dolores quaerat enim rem distinctio hic praesentium sit illo? Totam, omnis nostrum? Eaque, praesentium quae.</p>
                        </div>
                    </div>
                    <div class="item">
                        <div class="avt">
                            <img src="" alt="">
                        </div>
                        <div class="detail">
                            <p class="fullname">Fullname</p>
                            <p class="cmt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit ab totam excepturi sequi, omnis quod dolores quaerat enim rem distinctio hic praesentium sit illo? Totam, omnis nostrum? Eaque, praesentium quae.</p>
                        </div>
                    </div>
                </div>
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
                        <div class="tag">
                            <input type="checkbox" name="tag" id="tag1">
                            <label for="tag1">Tag</label>
                        </div>
                        <div class="tag">
                            <input type="checkbox" name="tag" id="tag2">
                            <label for="tag2">Tag</label>
                        </div>
                        <div class="tag">
                            <input type="checkbox" name="tag" id="tag3">
                            <label for="tag3">Tag</label>
                        </div>
                    </div>
                    <input type="submit" class="send-btn" value="Gửi">
                </form>
            </div>
        <?php
            }
        ?>
    </div>
</div>
<script>
    const activeBtn = document.querySelector('.active-btn')
    const addForm = document.querySelector('.ask__add')
    const prevBtn = document.querySelector('.prev-btn')
    activeBtn.ontouchstart = () => {
        addForm.classList.add('active')
        activeBtn.style.display = 'none'
    }
    prevBtn.ontouchstart = () => {
        addForm.classList.remove('active')
        activeBtn.style.display = 'flex'
    }
</script>