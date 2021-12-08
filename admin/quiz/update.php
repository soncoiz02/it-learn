<div class="admin__quiz">
    <div class="container">
        <div class="admin__quiz-add">
            <h2>Thêm quiz</h2>
            <form action="index.php" class="form" method="POST">
                <div class="label">
                    <p>Bài học</p>
                    <select name="lesson_id">
                        <?php
                            foreach($list_lesson as $value){
                                if($value['lesson_id'] == $lesson_id){
                        ?>
                            <option selected value="<?=$value['lesson_id']?>"><?=$value['title']?></option>
                        <?php
                                }
                                else{
                        ?>
                            <option value="<?=$value['lesson_id']?>"><?=$value['title']?></option>
                        <?php
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="label">
                    <p>Quiz ID</p>
                    <input type="text" placeholder="Quiz ID" name="quiz_id" class="question" value="<?=$quiz_id?>" readonly>
                </div>
                <div class="label">
                    <p>Câu hỏi</p>
                    <input type="text" placeholder="Đặt câu hỏi" name="question" class="question" value="<?=$question?>">
                </div>
                <div class="label">
                    <p>Đáp án</p>
                    <div class="list">
                        <input type="text" name="as1" placeholder="Đáp án 1" value="<?=$answer_1?>">
                        <input type="text" name="as2" placeholder="Đáp án 2" value="<?=$answer_2?>">
                        <input type="text" name="as3" placeholder="Đáp án 3" value="<?=$answer_3?>">
                        <input type="text" name="as4" placeholder="Đáp án đúng" value="<?=$correct_answer?>">
                    </div>
                </div>
                <input type="submit" value="Cập nhật" name="btn-update">
            </form>
        </div>
    </div>
    <?php
        if(strlen($MESSAGE)){
    ?>
        <div class="message <?=$type?>">
            <p>
                <?=$MESSAGE?>
            </p>
        </div>
    <?php
        }
    ?>
    <script>
        const mess = document.querySelector('.message')
        if(mess){
            setTimeout(() => {
                mess.remove()
            }, 3000)
        }
    </script>
</div>