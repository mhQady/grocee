<script setup></script>
<template>
    <section class="new-arrivals container-padding-top container">
        <div class="new-arrivals-header">
            <h3 class="section-title">new arrivals</h3>
            <ul class="nav-tabs__list">
                <li><a href="" class="nav-tabs__active"> all</a></li>
                <li><a href=""> fresh</a></li>
                <li><a href=""> fruits</a></li>
                <li><a href=""> nature</a></li>
                <li><a href=""> recipes</a></li>
                <li><a href=""> vegetable</a></li>
            </ul>
        </div>
        <div class="new-arrivals-body">
            <div class="product-card card-primary" v-for="n in 6" :key="n">
                <div class="product-card__header">
                    <div class="product-card__badge">sale</div>
                    <ul class="product-card__action-list">
                        <li>
                            <a href="">
                                <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                        fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="32">
                                    </path>
                                </svg></a>
                        </li>
                        <li>
                            <a href="">
                                <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                        fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32">
                                    </path>
                                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10"
                                        stroke-width="32" d="M338.29 338.29L448 448"></path>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="32"
                                        d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256">
                                    </path>
                                    <path
                                        d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                        fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="32">
                                    </path>
                                </svg>
                            </a>
                        </li>
                    </ul>
                    <img src="@img/website/placeholders/product.png" alt="product">
                </div>
                <div class="product-card__content">
                    <h4>Vegetable healthy</h4>
                    <a class="product-card__action-btn" href="#">+ add to cart</a>
                    <div class="product-card__prices">
                        <span class="current-price">$29.00</span>
                        <span class="old-price">$39.00</span>
                    </div>
                    <div class="rating-wrapper">
                        <ul class="rating-stars">
                            <li>
                                <svg class="rating-star-full" xmlns="http://www.w3.org/2000/svg" width="10.105"
                                    height="9.732" viewBox="0 0 10.105 9.732">
                                    <path data-name="star - Copy"
                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                </svg>
                            </li>
                            <li>
                                <svg class="rating-star-full" xmlns="http://www.w3.org/2000/svg" width="10.105"
                                    height="9.732" viewBox="0 0 10.105 9.732">
                                    <path data-name="star - Copy"
                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                </svg>
                            </li>
                            <li>
                                <svg class="rating-star-full" xmlns="http://www.w3.org/2000/svg" width="10.105"
                                    height="9.732" viewBox="0 0 10.105 9.732">
                                    <path data-name="star - Copy"
                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                </svg>
                            </li>
                            <li>
                                <svg class="rating-star-full" xmlns="http://www.w3.org/2000/svg" width="10.105"
                                    height="9.732" viewBox="0 0 10.105 9.732">
                                    <path data-name="star - Copy"
                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                </svg>
                            </li>
                            <li>
                                <svg class="rating-star-empty" xmlns="http://www.w3.org/2000/svg" width="10.105"
                                    height="9.732" viewBox="0 0 10.105 9.732">
                                    <path data-name="star - Copy"
                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                        transform="translate(0 -0.018)" fill="#c7c5c2"></path>
                                </svg>
                            </li>
                        </ul>
                        <span>(24)</span>
                    </div>
                </div>
            </div>
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

.product-banner img {
    object-fit: cover;
    width: 100%;
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

/* xs */
/* @media (min-width: 475px) {} */

/* sm */
/* @media (min-width: 640px) {} */

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
