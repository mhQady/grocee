import { createRouter, createWebHistory } from "vue-router";
import routes from "@dash/router/layoutRoutes";
import { checkAuthMiddleware } from "@dash/router/middlewares/checkAuthMiddleware";

const router = createRouter({
    history: createWebHistory(import.meta.env.APP_URL),
    routes,
    linkExactActiveClass: 'active',
})

router.beforeEach(checkAuthMiddleware);


export default router;
