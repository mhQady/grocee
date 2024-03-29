import { useAdminStore } from "@store/adminStore";

export function checkAuthMiddleware(to, from, next) {

    document.title = `${to.meta.title} | Grocee`;

    if (to.meta.middleware === 'auth' && !(useAdminStore().isAuth)) {
        next({ name: 'login' })
    }

    if (to.meta.middleware === 'guest' && useAdminStore().isAuth) {
        next({ name: 'home' })
    }

    next();
}
