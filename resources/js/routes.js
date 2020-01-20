import Vue from 'vue'
import VueRouter from 'vue-router'
import Create from './components/create'
Vue.use(VueRouter);

export default new VueRouter({
    mode:"history",
    routes:[
        {
            path: '/create',
            name: 'create',
            component: Create
        },
    ]
});



