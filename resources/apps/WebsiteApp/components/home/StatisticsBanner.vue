<script setup></script>
<template>
    <section class="statistics-banner container-margin-top">
        <img class="bg-img" src="@img/website/placeholders/statistics-banner.png" alt="statistics-banner">
        <div class="container statistics-banner__body">
            <div>
                <h4 class="statistics-banner__title">YEARS OF
                    FOUNDATION</h4>
                <span class="statistics-banner__value">50</span>
            </div>
            <div>
                <span class="statistics-banner__title">SKILLED TEAM
                    MEMBERS</span>
                <span class="statistics-banner__value">20</span>
            </div>
            <div>
                <span class="statistics-banner__title">SKILLED TEAM
                    MEMBERS</span>
                <span class="statistics-banner__value">8000</span>
            </div>
            <div>
                <span class="statistics-banner__title">MONTHLY
                    ORDERS</span>
                <span class="statistics-banner__value">100</span>
            </div>
        </div>
    </section>
</template>
<style scoped>
.statistics-banner {
    position: relative;
    height: 444px;
}

.statistics-banner__body {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    color: var(--clr-light);
    gap: var(--size-3xl)
}

.statistics-banner__body>* {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: var(--size-base);
    flex: 1 0 calc(48% - 10px);
    min-width: calc(48% - 10px);
    max-width: calc(48%-10px);
}

.statistics-banner__title {
    font-weight: 400;
    text-transform: uppercase;
    word-wrap: break-word;
}

.statistics-banner__value {
    font-weight: 600;
    font-size: var(--size-5xl);
}

@media (min-width: 640px) {}

/* lg */
@media (min-width: 1024px) {
    .statistics-banner__body {
        gap: var(--size-xxs);
    }

    .statistics-banner__body>* {
        flex: 1;
        min-width: calc(24% - 10px);
        max-width: calc(24%-10px);
    }
}
</style>
