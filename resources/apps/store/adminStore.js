import { defineStore } from 'pinia';
import AuthApi from '@/api/auth/Auth.api';
import Storage from '@service/storage';
import router from '@dash/router';

const ADMIN_COOKIE_KEY = '__Secure-Entity-Admin';

export const useAdminStore = defineStore('admin', {
    state: () => ({ admin: Storage.get(ADMIN_COOKIE_KEY) ?? null }),

    getters: {
        isAuth: (state) => !!state.admin,
        authAdmin: (state) => state.admin
    },

    actions: {
        async login(credentials) {
            await AuthApi.csrf();

            await AuthApi.loginAdmin(credentials).then(data => {
                this.admin = data.data.admin;
                Storage.set(ADMIN_COOKIE_KEY, data.data.admin);
                router.push({ name: 'home' });
                console.log(this.admin, data.data.admin, 'admin');
            });

        },

        async logout(admin) {

            // await AuthApi.logout();
            this.admin = null;
            // ability.update(this.getPermissions);
            Storage.clean();
            router.push({ name: 'login' });
        },

    }
})
