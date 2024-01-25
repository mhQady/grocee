<script setup>
import { Swiper, SwiperSlide } from 'swiper/vue';

import { Autoplay, Navigation } from 'swiper/modules';

import 'swiper/css';
import 'swiper/css/autoplay';
import 'swiper/css/navigation'

</script>
<template>
    <section class="feature-categories active-nav-buttons container">
        <h3 class="section-title">Featured Categories</h3>
        <swiper :slides-per-view="6" :space-between="50" :modules="[Navigation, Autoplay]"
            :autoplay="{ delay: 2000, disableOnInteraction: false }" :loop="true" :clickable="true" :navigation="{
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            }" :breakpoints="{
    1200: {
        slidesPerView: 6,
    },
    992: {
        slidesPerView: 5,
    },
    768: {
        slidesPerView: 4,
        spaceBetween: 30,
    },
    500: {
        slidesPerView: 3,
        spaceBetween: 20,
    },
    280: {
        slidesPerView: 2,
        spaceBetween: 20,
    },
    0: {
        slidesPerView: 1,
    },
}">
            <swiper-slide v-for="n in 9" :key="n">
                <img class="" src="@img/website/placeholders/category.png" alt="">
                <h4>
                    <a href="">
                        Fresh Fruits
                    </a>
                </h4>
                <p>6 products</p>
            </swiper-slide>
        </swiper>
    </section>
</template>
<style scoped>
.feature-categories {
    overflow: hidden;
    position: relative;
}

.feature-categories .swiper-slide {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.feature-categories .swiper-slide h4 {
    font-weight: 400;
    margin-top: 12px;
}

.feature-categories .swiper-slide p {
    font-size: var(--size-sm);
    color: var(--clr-slate600);
}
</style>
