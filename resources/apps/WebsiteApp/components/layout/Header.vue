<script setup>
import { useUserStore } from '@store/userStore';
import { useRoute } from 'vue-router';

const userStore = useUserStore();
const route = useRoute();
</script>
<template>
    <header class="header container">
        <RouterLink :to="{ name: 'home' }" class="header__logo">
            <img src="@img/website/logo.png" alt="logo">
        </RouterLink>
        <ul class="header__navbar">
            <li>
                <RouterLink :to="{ name: 'home' }">Home</RouterLink>
            </li>
            <li class="header__navbar-dropmenu">
                <a class="header__navbar-dropbtn" href="">shop</a>
                <div class="header__navbar-dropmenu-content">
                    <ul class="header__navbar-dropmenu-column">
                        <li>
                            <h5>col 1</h5>
                        </li>
                        <li><a href="#">1aaaaaa</a></li>
                        <li><a href="#">baaasds</a></li>
                        <li><a href="#">csasdasdas</a></li>
                    </ul>
                    <ul class="header__navbar-dropmenu-column">
                        <li>
                            <h5>col 2</h5>
                        </li>
                        <li><a href="#">1aaaaaa</a></li>
                        <li><a href="#">baaasds</a></li>
                        <li><a href="#">csasdasdas</a></li>
                    </ul>
                    <ul class="header__navbar-dropmenu-column">
                        <li>
                            <h5>col 2</h5>
                        </li>
                        <li><a href="#">1aaaaaa</a></li>
                        <li><a href="#">baaasds</a></li>
                        <li><a href="#">csasdasdas</a></li>
                    </ul>
                </div>
            </li>
            <li><a href="">blog</a></li>
            <li><a href="">contact</a></li>
        </ul>
        <ul class="header__icons">
            <li>
                <svg data-modal-btn-open="true" data-modal-target="search-modal" class="header__icon"
                    xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 50 50">
                    <path
                        d="M 21 3 C 11.654545 3 4 10.654545 4 20 C 4 29.345455 11.654545 37 21 37 C 24.701287 37 28.127393 35.786719 30.927734 33.755859 L 44.085938 46.914062 L 46.914062 44.085938 L 33.875 31.046875 C 36.43682 28.068316 38 24.210207 38 20 C 38 10.654545 30.345455 3 21 3 z M 21 5 C 29.254545 5 36 11.745455 36 20 C 36 28.254545 29.254545 35 21 35 C 12.745455 35 6 28.254545 6 20 C 6 11.745455 12.745455 5 21 5 z">
                    </path>
                </svg>
            </li>
            <li>
                <a href="#" class="header__link">
                    <svg class="header__icon" xmlns="http://www.w3.org/2000/svg" width="18.541" height="15.557"
                        viewBox="0 0 18.541 15.557">
                        <path
                            d="M71.775,135.51a5.153,5.153,0,0,1,1.267-1.524,4.986,4.986,0,0,1,6.584.358,4.728,4.728,0,0,1,1.174,4.914,10.458,10.458,0,0,1-2.132,3.808,22.591,22.591,0,0,1-5.4,4.558c-.445.282-.9.549-1.356.812a.306.306,0,0,1-.254.013,25.491,25.491,0,0,1-6.279-4.8,11.648,11.648,0,0,1-2.52-4.009,4.957,4.957,0,0,1,.028-3.787,4.629,4.629,0,0,1,3.744-2.863,4.782,4.782,0,0,1,5.086,2.447c.013.019.025.034.057.076Z"
                            transform="translate(-62.498 -132.915)" fill="currentColor">
                            <span class="badge-count">1</span>
                        </path>
                    </svg>
                </a>
            </li>
            <li v-if="userStore.isAuth">
                <RouterLink :to="{ name: 'main-info' }">
                    <svg class="header__icon" xmlns="http://www.w3.org/2000/svg" width="20.51" height="19.443"
                        viewBox="0 0 512 512">
                        <path d="M344 144c-3.92 52.87-44 96-88 96s-84.15-43.12-88-96c-4-55 35-96 88-96s92 42 88 96z"
                            fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="32"></path>
                        <path
                            d="M256 304c-87 0-175.3 48-191.64 138.6C62.39 453.52 68.57 464 80 464h352c11.44 0 17.62-10.48 15.65-21.4C431.3 352 343 304 256 304z"
                            fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path>
                    </svg>
                </RouterLink>
            </li>
            <li>
                <svg class="header__icon" data-modal-btn-open="true" data-modal-target="cart-modal"
                    xmlns="http://www.w3.org/2000/svg" width="16.706" height="15.534" viewBox="0 0 14.706 13.534">
                    <g id="cart" transform="translate(0 0)">
                        <g id="cart_icon">
                            <path id="Path_16787" data-name="Path 16787"
                                d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z"
                                transform="translate(0 -463.248)" fill="#fefefe"></path>
                            <path id="Path_16788" data-name="Path 16788"
                                d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z"
                                transform="translate(-1.191 -466.622)" fill="#fefefe"></path>
                            <path id="Path_16789" data-name="Path 16789"
                                d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z"
                                transform="translate(-2.875 -466.622)" fill="#fefefe"></path>
                        </g>
                    </g>
                </svg>
                <span class="badge-count">3</span>
            </li>
        </ul>
    </header>
</template>
<style scoped>
.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 12px;
    padding-bottom: 12px;
}

.header__logo {
    flex: 1;
}

.header__navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    text-transform: capitalize;
    font-size: var(--size-lg);
    gap: var(--size-2xl);
}

.header__navbar-dropmenu {
    position: relative;
}

.header__navbar-dropbtn::after {
    content: "\203A";
    margin-left: 0.3em;
    font-size: var(--size-2xl);
    display: inline-block;
    transition: transform 0.3s ease;
}

.header__navbar-dropbtn:hover::after {
    transform-origin: center;
    transform: rotate(90deg);
}

.header__navbar-dropmenu-content {
    position: absolute;
    top: 100%;
    left: 0;
    background-color: var(--clr-light);
    border-radius: 10px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    padding: var(--size-xl);
    z-index: 9;
    display: flex;
    gap: var(--size-2xl);
    visibility: hidden;
    opacity: 0;
    transition: all 0.3s ease;
}

.header__navbar-dropmenu-column {
    display: flex;
    flex-direction: column;
    gap: var(--size-base);
}

.header__icons {
    display: flex;
    align-items: center;
    justify-content: end;
    gap: 0.4em;
    flex: 1;
}

.header__icons>li {
    position: relative;
}

.header__icon {
    fill: var(--clr-light);
    color: var(--clr-light);
    background-color: var(--clr-green);
    border-radius: 50%;
    padding: 0.2em;
    cursor: pointer;
}

.header__icon.active {
    background-color: var(--clr-orange);
}

.header__icon:hover {
    background-color: var(--clr-orange);
}

.header__link {
    position: relative;
}

.badge-count {
    position: absolute;
    top: -7px;
    right: -2px;
    color: var(--clr-dark);
    background-color: var(--clr-light);
    outline: 1px solid var(--clr-green);
    border-radius: 50%;
    font-size: var(--size-xs);
    line-height: 1rem;
    min-width: 16px;
    min-height: 16px;
    aspect-ratio: 1/1;
    display: flex;
    justify-content: center;
    align-items: center;
}

.badge-count:empty {
    display: none;
}

.navbar-fixed {
    position: fixed;
    top: 0;
    left: 50%;
    transform: translateX(-50%);
    z-index: 11;
    background-color: var(--clr-light);
    box-shadow: 0 0 7px rgba(0, 0, 0, 0.15);
    transition: all 0.3s ease 0s;
}
</style>
