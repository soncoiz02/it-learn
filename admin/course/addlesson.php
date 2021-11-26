<div class="admin__course">
    <div class="container">
        <div class="admin__course-addlesson">
            <h2><?=$course_name?></h2>
            <form action="" class="form">
                <div class="form-left">
                    <label>
                        <p>Mã bài học</p>
                        <input type="text" placeholder="BH..." name="lesson_id">
                    </label>
                    <label>
                        <p>Tiêu đề</p>
                        <input type="text" name="title" placeholder="Nhập tiêu đề">
                    </label>
                    <input type="hidden" name="course_id" value="<?=$course_id?>">
                    <input type="submit" value="Thêm" name="btn-insert-lesson">
                </div>
                <div class="form-right">
                    <label>
                        <p>Chọn tài liệu</p>
                        <div class="select">
                            <div class="selected doc">Tên tài liệu <i class="fas fa-caret-down"></i></div>
                            <div class="list-opt doc">
                                <div class="search">
                                    <i class="fas fa-search"></i>
                                    <input type="text" placeholder="Tìm" class="search-input">
                                </div>
                                <div class="list doc">
                                </div>
                            </div>
                        </div>
                    </label>
                    <label>
                        <p>Chọn video</p>
                        <div class="select">
                            <div class="selected vid">Tên video <i class="fas fa-caret-down"></i></div>
                            <div class="list-opt vid">
                                <div class="search">
                                    <i class="fas fa-search"></i>
                                    <input type="text" placeholder="Tìm" class="search-input">
                                </div>
                                <div class="list vid">
                                </div>
                            </div>
                        </div>
                    </label>
                </div>
            </form>
            <script>
                const listDoc = document.querySelector('.list.doc')
                const listVid = document.querySelector('.list.vid')
                const dataDoc = [
                    <?php
                        foreach($list_doc as $key => $value){
                            $id = $value['doc_id'];
                            $name = $value['doc_name'];
                            echo "{
                                id: '$id',
                                name: '$name'
                            },";
                        }
                    ?>
                ]
                const dataVid = [
                    <?php
                        foreach($list_video as $key => $value){
                            $id = $value['vid_id'];
                            $name = $value['vid_name'];
                            echo "{
                                id: '$id',
                                name: '$name'
                            },";
                        }
                    ?>
                ]
                
                if(dataDoc.length > 0){
                    let optDoc = dataDoc.map(e => {
                        return `
                            <label for="${e.id}" class="opt doc">${e.name}</label>
                            <input type="radio" name="doc_id" id="${e.id}" value="${e.id}/>
                        `
                    })
                    listDoc.insertAdjacentHTML('beforeend', optDoc.join(''))
                }
                if(dataVid.length > 0){
                    let optVid = dataVid.map(e => {
                        return `
                            <label for="${e.id}" class="opt vid">${e.name}</label>
                            <input type="radio" name="vid_id" id="${e.id}" value="${e.id}"/>
                        `
                    })
                    listVid.insertAdjacentHTML('beforeend', optVid.join(''))
                }


                const searchInput = document.querySelectorAll('.search-input')
                searchInput[0].addEventListener('input', (e) => {
                    let value = e.target.value
                    let newOpt = dataDoc.map(e => {
                        if(e.name.toLowerCase().includes(value.toLowerCase())){
                            return `
                                <label for="${e.id}" class="opt doc">${e.name}</label>
                                <input type="radio" name="doc" id="${e.id}" value="${e.id}/>
                            `
                        }
                    })
                    listDoc.innerHTML = ""
                    listDoc.insertAdjacentHTML('beforeend', newOpt.join(''))
                    handleSelectBox()
                })
                searchInput[1].addEventListener('input', (e) => {
                    let value = e.target.value
                    let newOpt = dataVid.map(e => {
                        if(e.name.toLowerCase().includes(value.toLowerCase())){
                            return `
                                <label for="${e.id}" class="opt div">${e.name}</label>
                                <input type="radio" name="vid_id" id="${e.id}" value="${e.id}"/>
                            `
                        }
                    })
                    listVid.innerHTML = ""
                    listVid.insertAdjacentHTML('beforeend', newOpt.join(''))
                    handleSelectBox()
                })
            </script>
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

