<script setup></script>
<template>
    <section class="container">
        <a href="#" class="m-auto">
            <img src="@img/website/logo.png" alt="logo">
            dash
        </a>
        <div class="container-fluid py-4">
            <router-view v-slot="{ Component }">
                <transition name="fade" mode="out-in">
                    <component :is="Component" />
                </transition>
            </router-view>
        </div>
    </section>
</template>
<style scoped>
.auth-card {
    min-width: 400px;
}

@media (min-width: 475px) {
    .auth-card {
        min-width: 450px;
    }
}

@media (min-width: 640px) {
    .auth-card {
        min-width: 500px;
    }
}
</style>
