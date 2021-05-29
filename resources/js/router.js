import vueRouter from 'vue-router';
import Vue from 'vue';


Vue.use(vueRouter);

const routes = [
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
        component: () => import('./views/Admin')
    }
];

export default new vueRouter({
    mode: "history",
    routes
});