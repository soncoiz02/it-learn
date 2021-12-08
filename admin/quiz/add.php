<div class="admin__quiz">
    <div class="container">
        <div class="admin__quiz-add">
            <h2>Thêm quiz</h2>
            <form action="index.php" class="form" method="POST">
                <div class="label">
                    <p>Bài học</p>
                    <select name="lesson_id">
                        <option value="">Chọn bài học</option>
                        <?php
                            foreach($list_lesson as $key => $value){
                        ?>
                            <option value="<?=$value['lesson_id']?>"><?=$value['title']?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="label">
                    <p>Quiz ID</p>
                    <input type="text" placeholder="Quiz ID" name="quiz_id" class="question">
                </div>
                <div class="label">
                    <p>Câu hỏi</p>
                    <input type="text" placeholder="Đặt câu hỏi" name="question" class="question">
                </div>
                <div class="label">
                    <p>Đáp án</p>
                    <div class="list">
                        <input type="text" name="as1" placeholder="Đáp án 1">
                        <input type="text" name="as2" placeholder="Đáp án 2">
                        <input type="text" name="as3" placeholder="Đáp án 3">
                        <input type="text" name="as4" placeholder="Đáp án đúng">
                    </div>
                </div>
                <input type="submit" value="Thêm mới" name="btn-insert">
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