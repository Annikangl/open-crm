import vueRouter from 'vue-router';
import Vue from 'vue';


Vue.use(vueRouter);

const routes = [
    {
        path: "/",
        name: 'Home',
        meta: {layout: 'main'},
        component: () => import('./views/Home')
    }
];

export default new vueRouter({
    mode: "history",
    routes
});