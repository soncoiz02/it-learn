<div class="admin__course">
    <div class="container">
        <div class="admin__course-addlesson">
            <h2>Tên khóa học</h2>
            <form action="" class="form">
                <div class="form-left">
                    <label>
                        <p>Mã bài học</p>
                        <input type="text" placeholder="BH...">
                    </label>
                    <label>
                        <p>Tiêu đề</p>
                        <input type="text" name="title" placeholder="Nhập tiêu đề">
                    </label>
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
                                    <!-- <label for="a1" class="opt doc">dkashdhaskhdasjkdashjd</label>
                                    <input type="radio" name="doc" id="a1"/>
                                    <label for="a2" class="opt doc">dkashdhaskhdasjkdashjd</label>
                                    <input type="radio" name="doc" id="a2"/>
                                    <label for="a3" class="opt doc">aaashjd</label>
                                    <input type="radio" name="doc" id="a3"/>
                                    <label for="a4" class="opt doc">dkashdhaskhdasjkdashjd</label>
                                    <input type="radio" name="doc" id="a4"/>
                                    <label for="a5" class="opt doc">dkashdhaskhdasjkdashjd</label>
                                    <input type="radio" name="doc" id="a5"/>
                                    <label for="a6" class="opt doc">dkashdhaskhdasjkdashjd</label>
                                    <input type="radio" name="doc" id="a6"/> -->
                                </div>
                            </div>
                        </div>
                    </label>
                    <label>
                        <p>Chọn video</p>
                        <div class="select">
                            <div class="selected vid">Tên video <i class="fas fa-caret-down"></i></div>
                            <div class="list-opt vid">
                                <label for="b1" class="opt vid">1</label>
                                <input type="radio" name="vid" id="b1"/>
                                <label for="b2" class="opt vid">1</label>
                                <input type="radio" name="vid" id="b2"/>
                                <label for="b3" class="opt vid">1</label>
                                <input type="radio" name="vid" id="b3"/>
                                <label for="b4" class="opt vid">1</label>
                                <input type="radio" name="vid" id="b4"/>
                                <label for="b5" class="opt vid">1</label>
                                <input type="radio" name="vid" id="b5"/>
                                <label for="b6" class="opt vid">1</label>
                                <input type="radio" name="vid" id="b6"/>
                            </div>
                        </div>
                    </label>
                </div>
            </form>
            <script>
                const listDoc = document.querySelector('.list.doc')
                const data = [
                    {
                        id: 'a1',
                        name: 'sadjahskdhas'
                    },
                    {
                        id: 'a2',
                        name: 'izuxicuyzix'
                    },
                    {
                        id: 'a3',
                        name: 'nvkajgakskas'
                    },
                    {
                        id: 'a4',
                        name: 'bhhuajaw'
                    },
                    {
                        id: 'a5',
                        name: 'bbubuua'
                    },
                    {
                        id: 'a6',
                        name: 'yetywtwyte'
                    }
                ]

                let opt = data.map(e => {
                    return `
                        <label for="${e.id}" class="opt doc">${e.name}</label>
                        <input type="radio" name="doc" id="${e.id}"/>
                    `
                })
                listDoc.insertAdjacentHTML('beforeend', opt.join(''))

                const searchInput = document.querySelector('.search-input')
                searchInput.addEventListener('input', (e) => {
                    let value = e.target.value
                    let newOpt = data.map(e => {
                        if(e.name.toLowerCase().includes(value.toLowerCase())){
                            return `
                                <label for="${e.id}" class="opt doc">${e.name}</label>
                                <input type="radio" name="doc" id="${e.id}"/>
                            `
                        }
                    })
                    listDoc.innerHTML = ""
                    listDoc.insertAdjacentHTML('beforeend', newOpt.join(''))
                    handleSelectBox()
                })
            </script>
        </div>
    </div>
</div>

