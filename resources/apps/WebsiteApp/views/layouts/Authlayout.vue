<script setup></script>
<template>
    <section class="full-container center-container gap-3 flex-col">
        <a href="#">
            <img src="@img/website/logo.png" alt="logo">
        </a>
        <RouterView />
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
