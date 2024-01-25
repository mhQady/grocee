import { createRouter, createWebHistory } from "vue-router";
import routes from "@web/router/routes";
import { checkAuthMiddleware } from "@web/router/middlewares/checkAuthMiddleware";

const router = createRouter({
    history: createWebHistory(import.meta.env.APP_URL),
    routes,
    linkExactActiveClass: 'active',
})

router.beforeEach(checkAuthMiddleware);


// console.log(import.meta.env)



export default router;
