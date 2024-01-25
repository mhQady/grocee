<script setup>
import { Swiper, SwiperSlide } from 'swiper/vue';

import { Pagination, Autoplay } from 'swiper/modules';

import 'swiper/css';

import 'swiper/css/pagination';

import 'swiper/css/autoplay';
</script>
<template>
    <swiper class="main-slider" :slides-per-view="1" :space-between="40" :modules="[Pagination, Autoplay]"
        :pagination="{ el: '.swiper-pagination', type: 'bullets', clickable: true }" :loop="true"
        :autoplay="{ delay: 2000, disableOnInteraction: false }">
        <swiper-slide v-for="n in 3" :key="n">
            <img class="swiper__img-bg" src="@img/website/placeholders/slide.png" alt="slide">
            <div class="swiper-slide__content container">
                <div class="swiper__content_col">
                    <p class="swiper__subtitle">100% genuine Products</p>
                    <h2 class="swiper__title">Tasty & Healthy <br>Organic Food</h2>
                    <a href="#" type="button" class="btn btn-primary">shop now</a>
                </div>
                <img class="swiper-slide__img" width="200" src="@img/website/placeholders/slide_layer.png" alt="">
            </div>
        </swiper-slide>
        <div class="swiper-pagination"></div>
    </swiper>
</template>
<style scoped>
.main-slider {
    width: 100%;
    height: 470px;
    position: relative;
}

.swiper__img-bg {
    object-fit: cover;
    width: 100%;
    height: 100%;
    z-index: -1;
}

.swiper-slide__content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 100%;
    height: 100%;
    display: flex;
    padding-top: 30px;
    padding-bottom: 30px;
    gap: var(--size-5xl);
}

.swiper__content_col {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
}

.swiper-slide__content>* {
    flex: 1;
}

.swiper-pagination .swiper-pagination-bullet {
    width: var(--size-lg);
    height: 7px;
    background: var(--clr-orange);
    opacity: 1;
    border-radius: 2px;
}

.swiper-pagination .swiper-pagination-bullet.swiper-pagination-bullet-active {
    background: var(--clr-green);
}

.swiper__subtitle {
    margin-bottom: 15px;
}

.swiper__title {
    margin-bottom: 30px;
}
</style>
