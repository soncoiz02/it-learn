<div class="admin__tag">
    <div class="container">
        <div class="admin__tag-add">
            <h2>Thêm danh mục</h2>
            <form action="index.php" class="form" method="POST">
                <label>
                    <p>ID danh mục</p>
                    <input type="text" name="cate_id" readonly placeholder="Auto number">
                </label>
                <label>
                    <p>Tên danh mục</p>
                    <input type="text" name="cate_name" placeholder="Tên khóa học" class="cate-name">
                </label>
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