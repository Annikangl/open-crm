import vueRouter from 'vue-router';
import Vue from 'vue';


Vue.use(vueRouter);

const router = new vueRouter({
    mode: 'history',
    base: process.env.BASE_URL,
    routes: [
        {
            path: '/login',
            name: 'login',
            meta: {layout: 'empty'},
            component: () => import('./views/Login.vue')
        },
      
        {
            path: "/",
            name: 'Home',
            meta: {layout: 'main'},
            component: () => import('./views/Home')
        },

        {
            path: "/admin",
            name: 'Admin',
            meta: {auth: true},
            component: () => import('./views/Admin')
        },

        {
            path: "/admin/references",
            name: 'Admin',
            meta: {auth: true},
            component: () => import('./views/References')
        },

        {
            path: "/admin/create",
            name: 'create',
            meta: {auth: true},
            component: () => import('./views/CreateUser')
        },

        {
            path: "/admin/export",
            name: 'export-report',
            meta: {auth: true},
            component: () => import('./views/Reports')
        },
    ]
});

router.beforeEach((to,from,next) => {
    const currentUser = localStorage.getItem('userInfo');
    const requireAuth = to.matched.some(record => record.meta.auth)

    if (requireAuth && !currentUser) {
        next('/login')
    } else {
        next()
    }
})

export default router;


// export default new vueRouter({
//     mode: "history",
//     routes
// });