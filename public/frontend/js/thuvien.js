var swiper1 = new Swiper(".broker-slider1 .swiper", {
    slidesPerView: 1,
    spaceBetween: 0,
    pagination: {
        el: ".broker-slider1 .swiper-pagination",
        clickable: true,
    },
    // Responsive breakpoints
    breakpoints: {
        // when window width is >= 320px
        320: {
            slidesPerView: 1,
            spaceBetween: 0
        },
        // when window width is >= 480px
        768: {
            slidesPerView: 2,
            spaceBetween: 2,
        },
        // when window width is >= 640px
        1024: {
            slidesPerView: 4,
            spaceBetween: 2,
            navigation: {
                nextEl: ".broker-slider1 .swiper-button-next",
                prevEl: ".broker-slider1 .swiper-button-prev",
            },
        }
    },
});


var swiper2 = new Swiper(".broker-slider2 .swiper", {
    slidesPerView: 1,
    spaceBetween: 0,
    pagination: {
        el: ".broker-slider2 .swiper-pagination",
        clickable: true,
    },
    // Responsive breakpoints
    breakpoints: {
        // when window width is >= 320px
        320: {
            slidesPerView: 1,
            spaceBetween: 20
        },
        // when window width is >= 480px
        768: {
            slidesPerView: 1,
            spaceBetween: 0,
        },
        // when window width is >= 640px
        1024: {
            slidesPerView: 1,
            spaceBetween: 0,
            navigation: {
                nextEl: ".broker-slider2 .swiper-button-next",
                prevEl: ".broker-slider2 .swiper-button-prev",
            },
        }
    },
});