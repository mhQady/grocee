<script setup>
import Breadcrumb from '@dash/components/layout/Breadcrumb.vue';
import { useAdminStore } from '@store/adminStore';

const adminStore = useAdminStore();

function logout() {
    adminStore.logout();
}
</script>

<template>
    <header class="d-flex justify-content-between align-items-center mb-3">
        <Breadcrumb />

        <div class="d-flex gap-2 align-items-center">

            <input type="text" class="form-control" placeholder="Search" />

            <i class="fa-solid fa-user"></i>
            {{ adminStore.authAdmin.name }}

            <button v-if="adminStore.isAuth" class="btn btn-sm btn-primary" @click="logout">
                logout
            </button>

            <i class="fa-solid fa-gear"></i>

            <i class="fa-solid fa-bell"></i>
        </div>
    </header>
</template>
