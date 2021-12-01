<div class="courses">
    <div class="courses__quiz">
        <div class="container">
            <h2 class="question">
                <?=$question?>
            </h2>
            <div class="list-answer">
                <form method="POST">
                    <div class="list">
                        <input type="radio" name="answer" value="<?=$answer_1?>" id="as1">
                        <label for="as1">
                            1. <?=$answer_1?>
                        </label>
                        <input type="radio" name="answer" value="<?=$answer_2?>" id="as2">
                        <label for="as2">
                            2. <?=$answer_2?>
                        </label>
                        <input type="radio" name="answer" value="<?=$answer_3?>" id="as3">
                        <label for="as3">
                            3. <?=$answer_3?>
                        </label>
                        <input type="radio" name="answer" value="<?=$correct_answer?>" id="as4">
                        <label for="as4">
                            4. <?=$correct_answer?>
                        </label>
                    </div>
                    <input type="submit" value="Gửi đáp án" class="btn-send" name="btn-submit">
                </form>
            </div>
        </div>
        <?php
            $alert = '';
            $user = $_SESSION['user'];
            extract($user);
            if(isset($_POST['btn-submit'])){
                $as = $_POST['answer'];
                if($as == $correct_answer){
                    try {
                        marks_insert($username, $quiz_id, 10);
                        unset($username, $quiz_id);
                        $alert = "<div class='alert'>
                                    <div class='circle correct'>
                                        <i class='fas fa-check'></i>
                                    </div>
                                    <p>Chúc mừng bạn đã làm đúng. <img src='$IMG_URL/else/emoji2.png'></p>
                                    <a href='index.php?lesson&lesson_id=$les_id&id=$course_id'>Tiếp tục</a>
                                </div>";
                    } catch (PDOException $th) {
                        throw $th;
                    }
                }
                else{
                    $alert = "<div class='alert'>
                    <div class='circle wrong'>
                        <i class='fas fa-times'></i>
                    </div>
                    <p>Đáp án của bạn sai rồi. <img src='$IMG_URL/else/emoji1.png'></p>
                    <a href=''>Làm lại</a>
                    </div>";
                }
            }
        ?>
        <?php
            if(strlen($alert) > 0){
        ?>
            <div class="alert-mess">
                <div class="box">
                    <?=$alert?>
                </div>
            </div>
        <?php
            }
        ?>
    </div>
</div>