<script setup></script>
<template>
    <section class="banners container container-padding">
        <div class="banner" v-for="n in 3" :key="n">
            <a href="#">
                <img src="@img/website/placeholders/banner2.png" class="banner-img" title="banner img" />
            </a>
            <div class="banner-content">
                <p class="banner__subheader">banner supheader</p>
                <h4 class="banner__header">banner header</h4>
                <a href="#">
                    <a class="btn-arrow" type="button">shop now</a>
                </a>
            </div>
        </div>
    </section>
</template>
<style scoped>
.banners {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: var(--size-2xl);
    align-items: center;
}

.banner {
    flex: 1;
    min-width: 100%;
    height: 264px;
    position: relative;
}

.banner-img {
    object-fit: cover;
    width: 100%;
    height: 100%;
}

.banner-content {
    position: absolute;
    top: 16%;
    left: 25px;
    color: var(--clr-light);
}

.banner__subheader {
    font-size: var(--size-sm);
}

.banner__header {
    margin-bottom: var(--size-2xl);
}


/* sm */
@media (min-width: 640px) {
    .banner {
        flex: 1 0 calc(49% - 10px);
        min-width: calc(49% - 10px);
    }
}

/* lg */
@media (min-width: 1024px) {
    .banner {
        flex: 1 0 calc(30% - 10px);
        min-width: calc(30% - 10px);
    }
}
</style>
