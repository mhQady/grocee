<script setup>
import { ref } from 'vue';
import { RouterLink } from 'vue-router';
import Admin from '@model/Admin';
import { useAdminStore } from '@store/adminStore';

const admin = ref(new Admin());
const adminStore = useAdminStore();

const login = async () => {
    await adminStore.login(admin.value);
};

const checkAuth = async () => {
    await adminStore.checkAuth();
}

</script>
<template>
    <div class="card">
        <div class="card-header">
            <h3>login</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <input type="email" class="form-control" placeholder="email address" v-model="admin.email">
                </div>
                <div class="col-6">
                    <input type="password" class="form-control" placeholder="password" v-model="admin.password">
                </div>
                <div class="col-12">
                    <div class="d-flex align-center justify-between">
                        <div class="checkbox-group">
                            <input type="checkbox" id="rememberCheck">
                            <label for="rememberCheck" class="form-check-label">remember</label>
                        </div>
                        <a class="active" href="#">Forget your password?</a>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" @click="login">login</button>
            <!-- <button class="btn btn-full" @click="checkAuth">Auth</button> -->
        </div>
    </div>
</template>
