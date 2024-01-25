import Swiper from 'swiper';
import { Navigation, Pagination, Autoplay } from 'swiper/modules';

// new Swiper('.main-slider', {
//     modules: [ Pagination, Autoplay ],
//     autoplay: { delay: 2000, disableOnInteraction: false },
//     pagination: { el: '.swiper-pagination', type: 'bullets', clickable: true },
//     loop: true,
//     spaceBetween: 40
// });

// new Swiper('.feature-categories', {
//     modules: [ Navigation, Autoplay ],
//     slidesPerView: 6,
//     autoplay: { delay: 2000, disableOnInteraction: false },
//     loop: true,
//     clickable: true,
//     navigation: {
//         nextEl: '.swiper-button-next',
//         prevEl: '.swiper-button-prev',
//     },
//     spaceBetween: 50,
//     breakpoints: {
//         1200: {
//             slidesPerView: 6,
//         },
//         992: {
//             slidesPerView: 5,
//         },
//         768: {
//             slidesPerView: 4,
//             spaceBetween: 30,
//         },
//         500: {
//             slidesPerView: 3,
//             spaceBetween: 20,
//         },
//         280: {
//             slidesPerView: 2,
//             spaceBetween: 20,
//         },
//         0: {
//             slidesPerView: 1,
//         },
//     },
// });

// new Swiper('.week-deal', {
//     modules: [ Navigation, Autoplay ],
//     slidesPerView: 4,
//     autoplay: { delay: 2000, disableOnInteraction: false },
//     loop: true,
//     clickable: true,
//     navigation: {
//         nextEl: '.swiper-button-next',
//         prevEl: '.swiper-button-prev',
//     },
//     spaceBetween: 34,
//     breakpoints: {
//         1400: {
//             slidesPerView: 4,
//         },
//         1200: {
//             slidesPerView: 3,
//         },
//         992: {
//             slidesPerView: 3,
//             spaceBetween: 20,
//         },
//         500: {
//             slidesPerView: 2,
//             spaceBetween: 20,
//         },
//         280: {
//             slidesPerView: 1,
//         },
//         0: {
//             slidesPerView: 1,
//         },
//     },
// });

new Swiper('.blog-cards', {
    modules: [ Navigation, Autoplay ],
    slidesPerView: 3,
    autoplay: { delay: 2000, disableOnInteraction: false },
    loop: true,
    clickable: true,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    spaceBetween: 34,
    breakpoints: {
        1200: {
            slidesPerView: 3,
        },
        640: {
            slidesPerView: 2,
        },
        280: {
            slidesPerView: 1,
        },
        0: {
            slidesPerView: 1,
        },
    },
});
