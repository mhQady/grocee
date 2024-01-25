
export default [
    {
        path: '/login',
        name: 'login',
        component: () => import('@web/views/auth/Login.vue'),
        meta: {
            middleware: "guest",
            title: `Login`
        }
    },
    {
        path: '/register',
        name: 'register',
        component: () => import('@web/views/auth/Register.vue'),
        meta: {
            middleware: "guest",
            title: `Register`
        }
    }
];
