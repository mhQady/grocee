import { useUserStore } from "@/store/userStore";

export function checkAuthMiddleware(to, from, next) {

    document.title = `${to.meta.title} | Grocee`;

    console.log(useUserStore().isAuth, 'isAuth')
    if (to.meta.middleware === 'auth' && !(useUserStore().isAuth)) {
        next({ name: 'login' })
    }

    if (to.meta.middleware === 'guest' && useUserStore().isAuth) {
        next({ name: 'home' })
    }

    next();
}
