
export default [
    {
        path: '/',
        name: 'home',
        component: () => import('@web/views/Index.vue'),
        meta: {
            title: `Home`
        }
    },
    {
        path: '/profile',
        name: 'profile',
        component: () => import('@web/views/auth/Profile.vue'),
        meta: {
            middleware: "auth",
            title: `Profile`
        },
        children: [
            {
                path: '',
                name: 'main-info',
                component: () => import('@web/components/profile/MainInfo.vue'),
            },
            {
                path: 'address',
                name: 'address',
                component: () => import('@web/components/profile/Address.vue'),
            }
        ]
    }
];
