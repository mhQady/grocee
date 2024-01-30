
import websiteRoutes from './routes/websiteRoutes';
import authRoutes from './routes/authRoutes';

export default [
    {
        path: '/',
        component: () => import('@web/views/layouts/MasterLayout.vue'),
        children: websiteRoutes
    },
    {
        path: '/auth',
        component: () => import('@web/views/layouts/AuthLayout.vue'),
        children: authRoutes
    },
    { path: '/:pathMatch(.*)*', name: 'NotFound', component: () => import('@web/views/NotFound.vue') },
];
