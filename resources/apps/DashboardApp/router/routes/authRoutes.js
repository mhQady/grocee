
export default [
    {
        path: 'login',
        name: 'login',
        component: () => import('@dash/views/auth/Login.vue'),
        meta: {
            middleware: "guest",
            title: `Login`
        }
    },
];
