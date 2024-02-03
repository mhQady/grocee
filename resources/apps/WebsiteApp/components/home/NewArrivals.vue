<script setup>
import { onMounted, reactive } from 'vue';
import CategoryApi from '@api/Category.api';
import ProductApi from '@api/Product.api';
import DefaultImg from '@img/website/placeholders/product.png';
import ProductCard from '@web/components/general/ProductCard.vue';

let categories = reactive({});
let products = reactive({});
let active = null;

onMounted(() => {
    CategoryApi.getCategoriesHasNewestProducts().then((resp) => {
        categories = Object.assign(categories, resp.data.categories);
    })
    loadProducts()
})

function loadProducts(categoryId = '') {
    active = categoryId
    ProductApi.getLatest(categoryId).then((resp) => {
        products = Object.assign(products, resp.data.data.products);
    });
}
</script>
<template>
    <section class="new-arrivals container-padding-top container">
        <div class="new-arrivals-header">
            <h3 class="section-title">{{ $t('new_arrivals') }}</h3>
            <ul class="nav-tabs__list">
                <li><a href="javascript:;" :class="{ 'nav-tabs__active': !active }"
                        @click="loadProducts()">{{ $t('all') }}</a></li>
                <li v-for="category in categories">
                    <a href="javascript:;" :class="{ 'nav-tabs__active': active === category.id }"
                        @click="loadProducts(category.id)" disabled>{{ category.name }}</a>
                </li>
            </ul>
        </div>
        <div class="new-arrivals-body">
            <ProductCard v-for="product in products" :product="product" :key="product.id" />
            <div class="product-banner">
                <a href="#">
                    <img src="@img/website/placeholders/product-banner.png" title="banner img" />
                </a>
                <div class="product-banner__content">
                    <h3 class="product-banner__header">Vagetable eggplant</h3>
                    <p class="product-banner__subheader">We offer a hot deal offer every festival</p>
                    <a href="" class="btn btn-primary" type="button">shop now</a>
                </div>
            </div>
        </div>
    </section>
</template>
<style scoped>
.new-arrivals-header {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: var(--size-xs);
    margin-bottom: var(--size-3xl);
}

.new-arrivals-header>.section-title {
    margin-bottom: 0;
}

.nav-tabs__list {
    display: flex;
    gap: var(--size-2xl);
}

.nav-tabs__active {
    color: var(--clr-orange);
}

.nav-tabs__list>* {
    text-transform: capitalize;
    font-size: var(--size-lg);
}

.new-arrivals-body {
    display: flex;
    flex-wrap: wrap;
    gap: 26px;
    justify-content: space-between;
}

.product-banner {
    flex: 1;
    max-width: 100%;
    position: relative;
}

.product-banner .img-wrapper img {
    object-fit: cover;
    height: 100%;
}

.product-banner__content {
    position: absolute;
    left: 40px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--clr-light);
}

.product-banner__header {
    margin-bottom: var(--size-xs);
    font-weight: 400;
}

.product-banner__subheader {
    margin-bottom: var(--size-5xl);
}


.banner__btn {
    text-transform: capitalize;
    color: var(--clr-light);
}

.banner__btn::after {
    content: '\2192';
    font-size: var(--size-xl);
    margin-left: 5px;
    transform: margin-left 0.5s ease;
}

.banner__btn:hover::after {
    margin-left: var(--size-sm);
}

.nav-tabs__active[disabled] {
    pointer-events: none;
}

/* md */
@media (min-width: 768px) {

    .new-arrivals-header {
        justify-content: space-between;
        flex-direction: row;
    }
}

@media (min-width: 1024px) {
    .product-banner {
        flex: none;
    }
}

/* xl */
@media (min-width: 1280px) {
    .product-banner {
        flex: 1 0 calc(24% - 10px);
        max-width: calc(48% + 10px);
    }
}
</style>
