
import dashRoutes from './routes/dashRoutes';
import authRoutes from './routes/authRoutes';

export default [
    {
        path: '/dashboard',
        component: () => import('@dash/views/layouts/MasterLayout.vue'),
        children: dashRoutes
    },
    {
        path: '/dashboard/auth',
        component: () => import('@dash/views/layouts/AuthLayout.vue'),
        children: authRoutes
    },
    { path: '/:pathMatch(.*)*', name: 'NotFound', component: () => import('@dash/views/NotFound.vue') },
];
