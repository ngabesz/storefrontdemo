/* eslint-disable import/no-unresolved */
import Vue from 'vue';
import VueRouter from 'vue-router';
import OrderList from "../components/List.vue";
import OrderDetail from "../components/Detail.vue";



Vue.use(VueRouter);

const routes = [
    {
        path: "/orders",
        component: OrderList
    },
    {
        path: '/orders/details/:id',
        component: OrderDetail
    },
];

const router = new VueRouter({
    mode: "history",
    base: process.env.BASE_URL,
    routes
});

export default router;