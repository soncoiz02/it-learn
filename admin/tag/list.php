<div class="admin__tag">
    <div class="container">
        <div class="admin__tag-list">
            <h2>Danh sách danh mục</h2>
            <table class="table" border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên danh mục</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($list_cate as $key => $value){
                    ?>
                        <tr>
                            <td class="id"><?=$value['cate_id']?></td>
                            <td class="name"><?=$value['cate_name']?></td>
                            <td class="update">
                                <a href="">
                                    <i class="fas fa-tools"></i>
                                </a>
                            </td>
                            <td class="delete">
                                <a href="index.php?btn-delete&cate_id=<?=$value['cate_id']?>">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
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