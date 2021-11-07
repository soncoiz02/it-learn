const activeLink = () => {
    const listLink = document.querySelectorAll('.nav-link')
    const path = document.location.pathname
    if (path == '/itlearn/site/home/') {
        listLink[0].classList.add('active')
    }
    else if (path == '/itlearn/site/course/') {
        listLink[1].classList.add('active')
    }
    else if (path == '/itlearn/site/ask/') {
        listLink[2].classList.add('active')
    }
    else if (path == '/itlearn/site/blog/') {
        listLink[3].classList.add('active')
    }
}

const handleSwiper = () => {
    var swiperCourse = new Swiper(".swiper-item", {
        slidesPerView: 4,
        spaceBetween: 30,
        freeMode: true,
        scrollbar: {
            el: ".swiper-scrollbar",
        },
    });
    var swiperBanner = new Swiper(".swiper-banner", {
        centeredSlides: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
    });
}

activeLink()
handleSwiper()