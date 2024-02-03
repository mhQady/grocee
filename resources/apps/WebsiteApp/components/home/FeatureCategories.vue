<script setup>
import { onMounted, reactive } from 'vue';
import { Swiper, SwiperSlide } from 'swiper/vue';
import { Autoplay, Navigation } from 'swiper/modules';
import CategoryApi from '@api/Category.api';
import DefaultImg from '@img/website/placeholders/category.png';

import 'swiper/css';
import 'swiper/css/autoplay';
import 'swiper/css/navigation';

let categories = reactive({});
const baseUrl = `${window.location.origin}/storage`;
const breakpoints = {
    1200: { slidesPerView: 6 },
    992: { slidesPerView: 5 },
    768: { slidesPerView: 4, spaceBetween: 30 },
    500: { slidesPerView: 3, spaceBetween: 20 },
    280: { slidesPerView: 2, spaceBetween: 20 },
    0: { slidesPerView: 1 },
};

onMounted(() => {
    CategoryApi.getFeatureCategories().then((resp) => {
        categories = Object.assign(categories, resp.data.feature_categories);
    });
})
</script>
<template>
    <section class="feature-categories active-nav-buttons container">
        <h3 class="section-title">{{ $t('feature_categories') }}</h3>
        <swiper :slides-per-view="6" :space-between="50" :modules="[Navigation, Autoplay]"
            :autoplay="{ delay: 2000, disableOnInteraction: false }" :loop="true" :clickable="true" :navigation="{
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            }" :breakpoints="breakpoints">
            <swiper-slide v-for="category in categories  " :key="category.id">
                <div class="img-wrapper">
                    <img class=""
                        :src="category.image_id ? `${baseUrl}/${category.image_id}/${category.image_name}` : DefaultImg"
                        :alt="category.name">
                </div>
                <h4>
                    <a href="">
                        {{ category.name }}
                    </a>
                </h4>
                <p>{{ category.products_count + ' ' + $t('products') }} </p>
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

.feature-categories .swiper-slide .img-wrapper {
    width: 100%;
    height: 165px;
}

.feature-categories .swiper-slide img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: 50% 50%;
}
</style>
