<script setup>
import { onMounted } from 'vue';
import { useRoute } from 'vue-router';

const route = useRoute();
onMounted(() => {
    initNavBar();
})

function initNavBar() {
    let navLinks = document.querySelectorAll('.nav__item:has(.sidebar__collapse) .nav__link');
    let innerMenus = document.querySelectorAll('.sidebar__collapse');

    navLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            console.log(route.name, route.name?.startsWith('products'));
            let target = link.dataset.target;

            if (target) {
                link.classList.toggle('active');
                navLinks.forEach(el => {
                    if (el === link) return;

                    link.classList.remove('active');
                })


                let activeInnerMenu = document.querySelector(`#${target}`);
                activeInnerMenu.classList.toggle('show')

                innerMenus.forEach(el => {
                    if (el === activeInnerMenu) return;

                    el.classList.remove('show');
                })
            }
        })
    })
}
</script>
<template>
    <aside>
        <div class="sidebar__logo">
            <RouterLink :to="{ name: 'home' }">
                <img src="@img/website/logo.png" alt="logo">
            </RouterLink>
        </div>
        <hr class="sidebar__divider">
        <ul class="sidebar__nav">
            <!-- <li class="nav__item">
                <a href="#" class="nav__link">
                    <div class="icon shadow text-center d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-house"></i>
                    </div>
                    <span>{{ $t('dashboard') }}</span>
                </a>
            </li> -->

            <li class="nav__item">
                <a href="#products-nav" data-target="products-nav" class="nav__link"
                    :class="{ 'active': route.name?.startsWith('products') }">
                    <div class="icon shadow text-center d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-carrot"></i>
                    </div>
                    <span>{{ $t('products') }}</span>
                </a>
                <div class="sidebar__collapse" id="products-nav" :class="{ 'show': route.name?.startsWith('products') }">
                    <ul class="sidebar__nav">
                        <li class="nav__item">
                            <RouterLink :to="{ name: 'products' }" class="nav__link">
                                <span>{{ $t('products') }}</span>
                            </RouterLink>
                        </li>
                        <li class="nav__item ">
                            <RouterLink :to="{ name: 'products.create' }" class="nav__link">
                                <span>{{ $t('create.product') }}</span>
                            </RouterLink>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav__item">
                <a href="#categories-nav" data-target="categories-nav" class="nav__link"
                    :class="{ 'active': route.name?.startsWith('categories') }">
                    <div class="icon shadow text-center d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-list"></i>
                    </div>
                    <span>{{ $t('categories') }}</span>
                </a>
                <div class="sidebar__collapse" id="categories-nav"
                    :class="{ 'show': route.name?.startsWith('categories') }">
                    <ul class="sidebar__nav">
                        <li class="nav__item">
                            <RouterLink :to="{ name: 'categories' }" class="nav__link">
                                <span>{{ $t('categories') }}</span>
                            </RouterLink>
                        </li>
                        <li class="nav__item ">
                            <RouterLink :to="{ name: 'categories.create' }" class="nav__link">
                                <span>{{ $t('create.category') }}</span>
                            </RouterLink>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- <li class="nav__item">
                <a href="#SecondNav" data-target="SecondNav" class="nav__link">
                    <div class="icon shadow text-center d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-house"></i>
                    </div>
                    <span>Second</span>
                </a>
                <div class="sidebar__collapse" id="SecondNav">
                    <ul class="sidebar__nav">
                        <li class="nav__item">
                            <a class="nav__link active" href="../../pages/dashboards/default.html">
                                <span> Default </span>
                            </a>
                        </li>
                        <li class="nav__item ">
                            <a class="nav__link " href="../../pages/dashboards/automotive.html">
                                <span> Automotive </span>
                            </a>
                        </li>
                        <li class="nav__item">
                            <a href="#InnerNav" data-target="InnerNav" class="nav__link">
                                <span>Second</span>
                            </a>
                            <div class="sidebar__collapse" id="InnerNav">
                                <ul class="sidebar__nav">
                                    <li class="nav__item">
                                        <a class="nav__link active" href="../../pages/dashboards/default.html">
                                            <span> Default </span>
                                        </a>
                                    </li>
                                    <li class="nav__item ">
                                        <a class="nav__link " href="../../pages/dashboards/automotive.html">
                                            <span> Automotive </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li> -->
        </ul>
    </aside>
</template>

