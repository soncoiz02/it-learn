<div class="admin__tag">
    <div class="container">
        <div class="admin__tag-add">
            <h2>Sửa danh mục</h2>
            <form action="index.php" class="form" method="POST">
                <label>
                    <p>ID danh mục</p>
                    <input type="text" name="cate_id" readonly placeholder="Auto number" value="<?=$cate_id?>">
                </label>
                <label>
                    <p>Tên danh mục</p>
                    <input type="text" name="cate_name" placeholder="Tên khóa học" class="cate-name" value="<?=$cate_name?>">
                </label>
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