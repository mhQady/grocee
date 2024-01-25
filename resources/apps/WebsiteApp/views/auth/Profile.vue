<script setup>
import { useRoute } from 'vue-router';
import { useUserStore } from '@web/store/userStore';

const route = useRoute();

const userStore = useUserStore();
const logout = async () => {
    console.log('clicked');
    await userStore.logout();
};

</script>
<template>
    <section class="container container-padding ">
        <div class="card">
            <div class="card-header">
                <h3>profile</h3>
            </div>
            <div class="card-body profile-content-wrapper">
                <ul class="profile-links">
                    <li>
                        <RouterLink :to="{ name: 'main-info' }">
                            Main info
                        </RouterLink>
                    </li>
                    <li>
                        <RouterLink :to="{ name: 'address' }">
                            address
                        </RouterLink>
                    </li>
                    <li>
                        <button class="btn" @click="logout">
                            logouttttt
                        </button>
                    </li>
                </ul>
                <div class="profile-content">
                    <RouterView />
                </div>
            </div>
        </div>
    </section>
</template>
<style scoped>
.card {
    padding: var(--size-xl);
}

.profile-content-wrapper {
    display: flex;
    justify-content: space-between;
}

.profile-content-wrapper>* {
    display: flex;
    flex-direction: column;
    gap: var(--size-lg);
}

.profile-links {
    flex: 1;
    border-right: 1px solid var(--clr-gray200);
    text-transform: capitalize;
    font-size: var(--size-lg);
}

.profile-content {
    flex: 5;
    padding: 0 1.35rem;
}
</style>
