<script setup>
import Sidebar from '@dash/components/layout/Sidebar.vue';
import Header from '@dash/components/layout/HeaderComp.vue';
// import Footer from '@dash/components/layout/Footer.vue';
</script>
<template>
    <Sidebar />
    <main class="main-container">
        <Header />
        <RouterView />
        <!-- <router-view v-slot="{ Component }">
            <transition name="fade" mode="out-in">
                <component :is="Component" />
            </transition>
        </router-view> -->
    </main>
</template>
<style scoped>
body {
    background-color: var(--clr-gray100);
}

aside {
    position: fixed;
    top: 0;
    left: 0;
    background-color: var(--clr-light);
    box-shadow: 0 20px 27px 0 rgba(0, 0, 0, .05);
    width: 15.5rem;
    height: calc(100vh - 32px);
    display: flex;
    flex-direction: column;
    margin: 16px;
    border-radius: 6px;
    overflow-y: auto;
}

.main-container {
    margin-left: calc(15.5rem + 32px);
    margin-top: 16px;
    margin-right: 16px;
    min-height: calc(100vh - 32px);
    border-radius: 6px;
}

.sidebar__logo {
    height: 52px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 10px;
}

.sidebar__logo img {
    object-fit: cover;
    height: 100%;
    max-width: 100%;
    max-height: 100%;
    text-align: center;
}

.sidebar__divider {
    border: none;
    height: 1px;
    width: 100%;
    background: linear-gradient(to right, transparent, rgba(188, 188, 188, 0.60), transparent);
    margin: 0;
}
</style>
