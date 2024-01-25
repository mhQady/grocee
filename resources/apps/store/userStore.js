import { defineStore } from 'pinia';
import AuthApi from '@/api/auth/Auth.api';
import Storage from '@service/storage';

const USER_COOKIE_KEY = '__Secure-Entity';

export const useUserStore = defineStore('user', {
    state: () => ({ user: Storage.get(USER_COOKIE_KEY) ?? null }),

    getters: {
        isAuth: (state) => !!state.user,
        authUser: (state) => state.user
    },

    actions: {
        async register(credentials) {

            await AuthApi.csrf();

            const data = await AuthApi.register(credentials)

            console.log(data.data, 'data');
            // const { data: { data } } = await AuthApi.login({ ...user, scope: 'user.full' });

            this.user = data.data.user;
            Storage.set(USER_COOKIE_KEY, data.data.user);
            // ability.update(this.getPermissions);
            return data;
        },

        async login(credentials) {
            await AuthApi.csrf();

            await AuthApi.login(credentials).then(data => {
                this.user = data.data.user;
                Storage.set(USER_COOKIE_KEY, data.data.user);
                console.log(this.user, data.data.user, 'user');
            });

        },

        async logout(user) {

            await AuthApi.logout();
            this.user = null;
            // ability.update(this.getPermissions);
            Storage.clean();
        },

    }
})
