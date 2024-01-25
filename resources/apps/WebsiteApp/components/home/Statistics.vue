<script setup></script>
<template>
    <section class="statistics container-margin-top container">
        <div>
            <h3 class="statistics__title">best seller</h3>
            <div class="product-card-sm" v-for="n in 3" :key="n">
                <div class="product-card-sm__img">
                    <img src="@img/website/placeholders/product-sm.png" alt="">
                </div>
                <div class="product-card-sm__content">
                    <h4>
                        <a href="#">
                            green surface
                        </a>
                    </h4>
                    <span>$29.00</span>
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
        </div>
        <div>
            <h3 class="statistics__title">trending</h3>
            <div class="product-card-sm" v-for="n in 3" :key="n">
                <div class="product-card-sm__img">
                    <img src="@img/website/placeholders/product-sm.png" alt="">
                </div>
                <div class="product-card-sm__content">
                    <h4>
                        <a href="#">
                            green surface
                        </a>
                    </h4>
                    <span>$29.00</span>
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
        </div>
        <div>
            <h3 class="statistics__title">top rated</h3>
            <div class="product-card-sm" v-for="n in 3" :key="n">
                <div class="product-card-sm__img">
                    <img src="@img/website/placeholders/product-sm.png" alt="">
                </div>
                <div class="product-card-sm__content">
                    <h4>
                        <a href="#">
                            green surface
                        </a>
                    </h4>
                    <span>$29.00</span>
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
    </section>
</template>
<style scoped>
.statistics {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: var(--size-3xl);
}

.statistics>* {
    flex: 1;
    max-width: 100%;
}

.statistics__title {
    padding-bottom: 20px;
    margin-bottom: 20px;
    text-transform: capitalize;
    position: relative;
}

.statistics__title::before {
    content: "";
    position: absolute;
    left: 0;
    bottom: 0;
    width: 70px;
    height: 4px;
    background-color: var(--clr-green);
}

.product-card-sm {
    display: flex;
    gap: var(--size-xs);
}

.product-card-sm__content {
    display: flex;
    flex-direction: column;
    justify-content: center;
    gap: 4px;
}

.product-card-sm__content>h4 {
    font-weight: 400;
    text-transform: capitalize;
}

.product-card-sm__content .rating-wrapper {
    margin-top: 0;
}

.product-card-sm__img {
    width: 110px;
    height: 110px;
}

.product-card-sm__img img {
    object-fit: cover;
    width: 100%;
    height: 100%;
}

.statistics>div .product-card-sm:not(:last-child) {
    margin-bottom: 15px;
    padding-bottom: 15px;
    position: relative;
}

.statistics>div .product-card-sm:not(:last-child)::before {
    content: "";
    position: absolute;
    left: 0;
    bottom: 0;
    width: 100%;
    height: 1px;
    background-color: var(--clr-gray100);
}

.statistics .product-banner__content {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    color: var(--clr-light);
    text-align: center;
}

.statistics .product-banner {
    display: none;
}

/* sm */
@media (min-width: 640px) {
    .statistics .product-banner {
        display: block;
    }

    .statistics>* {
        flex: 1 0 calc(48% - 10px);
        max-width: calc(48% - 10px);
    }
}

/* lg */
@media (min-width: 1280px) {
    .statistics>* {
        flex: 1 0 calc(24% - 10px);
        max-width: calc(24% - 10px);
    }
}
</style>
