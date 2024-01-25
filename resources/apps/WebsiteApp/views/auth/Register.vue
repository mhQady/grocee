<script setup>
import { ref } from 'vue';
import { useUserStore } from "@web/store/userStore";

const userStore = useUserStore()
const payload = ref({
    name: '',
    email: '',
    phone: '',
    password: '',
    password_confirmation: '',
});

async function register() {
    await userStore.register(payload.value);
    console.log(userStore.authUser, 'reggg');
    // axios.get('/sanctum/csrf-cookie').then(response => {
    //     console.log(payload.value, response, 'register');
    // });

    // axios.create({
    //     baseURL: '/api/v1',
    //     withCredentials: true,
    //     headers: {
    //         'Content-Type': 'application/json',
    //     },
    // }).post('/register', payload.value).then(response => {
    //     console.log(response, 'register');
    // });
}

</script>
<template>
    <!-- {{ payload }} -->
    <div class="card auth-card">
        <div class="card-header">
            <h3>Create an account</h3>
        </div>
        <div class="card-body d-flex flex-col gap-2">
            <input type="text" placeholder="name" v-model="payload.name">
            <input type="email" placeholder="email address" v-model="payload.email">
            <input type="tel" placeholder="phone" v-model="payload.phone">
            <input type="password" placeholder="password" v-model="payload.password">
            <input type="password" placeholder="confirm password" v-model="payload.password_confirmation">
            <button class="btn btn-full" @click="register">register</button>
            <span class="or-separator">or</span>
            <div class="social-login-wrapper">
                <button class="btn btn-full bg-facebook">facebook</button>
                <button class="btn btn-full bg-google">google</button>
                <button class="btn btn-full bg-x">x</button>
            </div>
            <span>Already have an account? <RouterLink class="active" :to="{ name: 'login' }">Login now</RouterLink>
            </span>
        </div>
    </div>
</template>
