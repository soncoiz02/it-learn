const activeLink = () => {
    const listLink = document.querySelectorAll('.link')
    listLink.forEach(e => {
        e.onclick = () => {
            const linkActive = document.querySelector('.link.active')
            if (linkActive) linkActive.classList.remove('active')
            e.classList.add('active')
        }
    })
    const path = document.location.pathname
    if (path == '/itlearn/admin/dashboard/') {
        listLink[0].classList.add('active')
    }
    else if (path == '/itlearn/admin/tag/') {
        listLink[1].classList.add('active')
    }
    else if (path == '/itlearn/admin/course/') {
        listLink[2].classList.add('active')
    }
    else if (path == '/itlearn/admin/blog/') {
        listLink[3].classList.add('active')
    }
    else if (path == '/itlearn/admin/question/') {
        listLink[4].classList.add('active')
    }
    else if (path == '/itlearn/admin/user/') {
        listLink[5].classList.add('active')
    }
}

const activeSideBar = () => {
    const sideBar = document.querySelector('.admin__sidebar')
    const btnBar = document.querySelector('.btn-bar')
    btnBar.onclick = () => {
        sideBar.classList.toggle('active')
    }
}

const handleSelectBox = () => {
    const selectedDoc = document.querySelector('.selected.doc')
    const optDoc = document.querySelector('.list-opt.doc')
    const listOptDoc = document.querySelectorAll('.opt.doc')

    const selectedVid = document.querySelector('.selected.vid')
    const optVid = document.querySelector('.list-opt.vid')
    const listOptVid = document.querySelectorAll('.opt.vid')
    console.log(listOptDoc)
    activeSelect(selectedDoc, listOptDoc, optDoc)
    activeSelect(selectedVid, listOptVid, optVid)
}

const activeSelect = (selected, listOpt, opt) => {
    selected.onclick = () => {
        opt.classList.toggle('active')
    }
    listOpt.forEach(e => {
        e.onclick = () => {
            selected.innerHTML = e.textContent
            opt.classList.remove('active')
        }
    })
}


activeLink()
activeSideBar()
const lesson = document.querySelector('.admin__course-addlesson')
console.log(lesson)
if (lesson) handleSelectBox()