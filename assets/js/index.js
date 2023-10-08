let swiper1 = new Swiper('.card__content.card1', {
    loop: true,
    spaceBetween: 32,
    grabCursor: true,

    pagination: {
        el: '.card1.swiper-pagination',
        clickable: true,
        dynamicBullets: true,
    },

    navigation: {
        nextEl: '.bn1',
        prevEl: '.br1',
    },

    breakpoints: {
        600: {
            slidesPerView: 3,
        },
        968: {
            slidesPerView: 4,
        }
    }
});

let swiper2 = new Swiper('.card__content.card2', {
    loop: true,
    spaceBetween: 32,
    grabCursor: true,

    pagination: {
        el: '.card2.swiper-pagination',
        clickable: true,
        dynamicBullets: true,
    },

    navigation: {
        nextEl: '.bn2',
        prevEl: '.br2',
    },

    breakpoints: {
        600: {
            slidesPerView: 3,
        },
        968: {
            slidesPerView: 4,
        }
    }
});

let swiper3 = new Swiper('.card__content.card3', {
    loop: true,
    spaceBetween: 32,
    grabCursor: true,

    pagination: {
        el: '.card3.swiper-pagination',
        clickable: true,
        dynamicBullets: true,
    },

    navigation: {
        nextEl: '.bn3',
        prevEl: '.br3',
    },

    breakpoints: {
        600: {
            slidesPerView: 3,
        },
        968: {
            slidesPerView: 4,
        }
    }
});

let swiper4 = new Swiper('.card__content.card4', {
    loop: true,
    spaceBetween: 32,
    grabCursor: true,

    pagination: {
        el: '.card4.swiper-pagination',
        clickable: true,
        dynamicBullets: true,
    },

    navigation: {
        nextEl: '.bn4',
        prevEl: '.br4',
    },

    breakpoints: {
        600: {
            slidesPerView: 3,
        },
        968: {
            slidesPerView: 4,
        }
    }
});