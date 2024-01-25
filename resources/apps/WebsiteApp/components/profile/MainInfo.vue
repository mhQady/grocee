<script setup>
import { ref } from 'vue';
import { useUserStore } from '@web/store/userStore';

const user = ref({
    name: useUserStore().authUser.name,
    email: useUserStore().authUser.email,
    phone: useUserStore().authUser.phone,
});
</script>
<template>
    <h4>main info</h4>
    <div class="profile-content__inputs">
        <input type="text" placeholder="name" v-model="user.name">
        <input type="email" placeholder="email address" v-model="user.email">
        <input type="tel" placeholder="phone" v-model="user.phone">
    </div>
    <button class="btn btn-primary ">save</button>
</template>

<style scoped>
.profile-content__inputs {
    display: flex;
    gap: var(--size-xs);
    flex-wrap: wrap;
}

.profile-content__inputs>* {
    flex: 1 0 calc(49% - 10px);
    min-width: calc(49% - 10px);
    max-width: calc(49% - 10px);
}
</style>
