require('./bootstrap');
import Vue from 'vue';
import VueRouter from 'vue-router';
import App from './App.vue';
import '../css/app.css'
import routes from './routes';
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';




Vue.use(VueRouter);
Vue.use(ElementUI);


const router = new VueRouter({
    mode: 'history',
    routes,
});

new Vue({
    el: '#app',
    render: h => h(App),
    router,
});