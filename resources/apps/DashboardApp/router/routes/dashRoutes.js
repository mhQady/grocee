
import i18n from "@lang";
const { t } = i18n.global;

export default [
    {
        path: '',
        name: 'home',
        component: () => import('@dash/views/Index.vue'),
        meta: {
            middleware: "auth",
            title: `Home`
        }
    },
    {
        path: 'products',
        name: 'products',
        component: () => import('@dash/views/products/Index.vue'),
        meta: {
            middleware: "auth",
            title: `Products`
        }
    },
    {
        path: 'products/create',
        name: 'products.create',
        component: () => import('@dash/views/products/CreateUpdate.vue'),
        meta: {
            middleware: "auth",
            title: t('create.product')
        }
    },
    {
        path: 'products/:id(\\d+)/edit',
        name: 'products.edit',
        component: () => import('@dash/views/products/CreateUpdate.vue'),
        meta: {
            requiresAuth: true,
            title: t('edit.product'),
        }
    },
    {
        path: 'categories',
        name: 'categories',
        component: () => import('@dash/views/categories/Index.vue'),
        meta: {
            middleware: "auth",
            title: `categories`
        }
    },
    {
        path: 'categories/create',
        name: 'categories.create',
        component: () => import('@dash/views/categories/CreateUpdate.vue'),
        meta: {
            middleware: "auth",
            title: t('create.category')
        }
    },
    {
        path: 'categories/:id(\\d+)/edit',
        name: 'categories.edit',
        component: () => import('@dash/views/categories/CreateUpdate.vue'),
        meta: {
            requiresAuth: true,
            title: t('edit.category'),
        }
    },
];
