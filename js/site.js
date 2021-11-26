const homePage = document.querySelector('.home')

const activeLink = () => {
    const listLink = document.querySelectorAll('.nav-link')
    const path = document.location.pathname
    if (path.includes('/itlearn/site/home/')) {
        listLink[0].classList.add('active')
    }
    else if (path.includes('/itlearn/site/course/')) {
        listLink[1].classList.add('active')
    }
    else if (path.includes('/itlearn/site/ask/')) {
        listLink[2].classList.add('active')
    }
    else if (path.includes('/itlearn/site/blog/')) {
        listLink[3].classList.add('active')
    }
}

const handleSwiper = () => {
    const mobile = window.matchMedia("(max-width: 768px)")
    if (mobile.matches) {
        var swiperCourse = new Swiper(".swiper-course", {
            slidesPerView: 1.2,
            spaceBetween: 20,
            freeMode: true,
            scrollbar: {
                el: ".swiper-scrollbar",
            },
        });
        var swiperBlog = new Swiper(".swiper-blog", {
            slidesPerView: 1.2,
            spaceBetween: 20,
            freeMode: true,
            scrollbar: {
                el: ".swiper-scrollbar",
            },
        });
    }
    else {
        var swiperCourse = new Swiper(".swiper-course", {
            slidesPerView: 4,
            spaceBetween: 30,
            freeMode: true,
            scrollbar: {
                el: ".swiper-scrollbar",
            },
        });
        var swiperBlog = new Swiper(".swiper-blog", {
            slidesPerView: 4,
            spaceBetween: 30,
            freeMode: true,
            scrollbar: {
                el: ".swiper-scrollbar",
            },
        });
    }
    var swiperBanner = new Swiper(".swiper-banner", {
        centeredSlides: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
    });
}

const showOnScroll = () => {
    const scroll = window.requestAnimationFrame || function (callback) { window.setTimeout(callback, 1000 / 60) }

    const elToShow = document.querySelector('.home__study')

    const isElInViewport = (el) => {
        if (el) {
            const rect = el.getBoundingClientRect()
            return (
                (rect.top <= 0 && rect.bottom >= 0) ||
                (
                    rect.bottom >= (window.innerHeight || document.documentElement.clientHeight) &&
                    rect.top <= (window.innerHeight || document.documentElement.clientHeight)
                ) ||
                (rect.top >= 0 && rect.bottom <= (window.innerHeight || document.documentElement.clientHeight))
            )
        }
    }

    const loop = () => {
        if (isElInViewport(elToShow)) {
            elToShow.classList.add('showing')
        }
        else {
            elToShow.classList.remove('showing')
        }
        scroll(loop)
    }
    loop()
}

const activeSideBar = () => {
    const barBtn = document.querySelector('.header__right-btn-bar')
    const sideBar = document.querySelector('.main__side-bar')
    barBtn.addEventListener('touchstart', () => {
        sideBar.classList.toggle('active')
    })
}

const markBtn = document.querySelector('.mark-btn')
const activeMark = () => {
    if (markBtn) {
        markBtn.addEventListener('click', () => {
            markBtn.classList.toggle('active')
        })
    }
}

activeLink()
activeSideBar()
activeMark()
if (homePage) {
    handleSwiper()
    showOnScroll()
}