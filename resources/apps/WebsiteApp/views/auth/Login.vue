<script setup>
import { ref } from 'vue';
import { RouterLink } from 'vue-router';
import User from '@model/User';
import { useUserStore } from '@store/userStore';

const user = ref(new User());
const userStore = useUserStore();

const login = async () => {
    await userStore.login(user.value);
};

const checkAuth = async () => {
    await userStore.checkAuth();
}

</script>
<template>
    <div class="card auth-card">
        <div class="card-header">
            <h3>login</h3>
        </div>
        <div class="card-body d-flex flex-col gap-2">
            <input type="email" placeholder="email address" v-model="user.email">
            <input type="password" placeholder="password" v-model="user.password">
            <div class="d-flex align-center justify-between">
                <div class="checkbox-group">
                    <input type="checkbox" id="rememberCheck">
                    <label for="rememberCheck" class="form-check-label">remember</label>
                </div>
                <a class="active" href="#">Forget your password?</a>
            </div>
            <button class="btn btn-full" @click="login">login</button>
            <button class="btn btn-full" @click="checkAuth">Auth</button>
            <span class="or-separator">or</span>
            <div class="social-login-wrapper">
                <button class="btn btn-full bg-facebook">facebook</button>
                <button class="btn btn-full bg-google">google</button>
                <button class="btn btn-full bg-x">x</button>
            </div>
            <span>Don't have an account? <RouterLink class="active" :to="{ name: 'register' }">Register now</RouterLink>
            </span>
        </div>
    </div>
</template>
