/* eslint-disable import/no-unresolved */
import Vue from 'vue';
import VueRouter from 'vue-router';
import CustomerList from "../components/List.vue";
import CustomerDetail from "../components/Detail.vue";
import CustomerEdit from "../components/Edit.vue";



Vue.use(VueRouter);

const routes = [
    {
        path: "/customers",
        component: CustomerList
    },
    {
        path: '/customers/:id/details',
        component: CustomerDetail
    },
    {
        path: '/customers/:id/details/edit',
        component: CustomerEdit
    },
];

const router = new VueRouter({
    mode: "history",
    base: process.env.BASE_URL,
    routes
});

export default router;