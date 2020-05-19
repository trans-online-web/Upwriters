/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


window.Vue = require('vue');

// VueRouter
import VueRouter from 'vue-router';

Vue.use(VueRouter);
//moment js
import moment from 'moment';
Vue.filter('myDate',function(created){
    return moment(created).format('MMMM Do YYYY');
});

//Gate
import Gate from "./Gate";

Vue.prototype.$gate = new Gate(window.user);
// VForm
import {Form, HasError, AlertError} from 'vform';

window.Form = Form;
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);
// progress bar
import VueProgressBar from 'vue-progressbar';

Vue.use(VueProgressBar, {
    color: 'rgb(143, 255, 199)',
    failedColor: 'red',
    height: '3px'
})

import {Datetime} from 'vue-datetime';

Vue.component('datetime', Datetime);

import VueNumericInput from 'vue-numeric-input';

Vue.use(VueNumericInput);

//Loadash
import uniq from 'lodash/uniq'

window.uniq = uniq;
//paypal
import LoadScript from 'vue-plugin-load-script';
Vue.use(LoadScript);

// sweatalert
import swal from 'sweetalert2';

window.swal = swal;
const toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});
window.toast = toast;
window.Fire = new Vue();
//pagination
Vue.component('pagination', require('laravel-vue-pagination'));
//Routes
let routes = [
    {path: '/user', component: require('./components/Users.vue').default},
    {path: '/dashboard', component: require('./components/dashboard.vue').default},
    {path: '/subject', component: require('./components/Subjects.vue').default},
    {path: '/documents', component: require('./components/Documents.vue').default},
    {path: '/levels', component: require('./components/Levels.vue').default},
    {path: '/orders', component: require('./components/TaskOrders.vue').default},
    {path: '/orderdetails/:orderId', component: require('./components/OrderDetails.vue').default},
    {path: '/MyOrderDetails/:orderId', component: require('./components/MyOrderDetails.vue').default},
    {path: '/userDetails/:userId', component: require('./components/userDetails').default},
    {path: '/MyOrder', component: require('./components/Myoders.vue').default},
    {path: '/chat', component: require('./components/Chat.vue').default},
    {path: '/blog-admin', component: require('./components/Blog.vue').default},
    {path: '/blog-categories', component: require('./components/BlogCategories.vue').default},
    {path: '/readmore/:blogId', component: require('./components/Readmore.vue').default},
    {path: '/blogcontent/:blogId', component: require('./components/Blog/BlogContent').default},

]
const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
})

Vue.filter('upText', function (text) {
    return text.charAt(0).toUpperCase() + text.slice(1)
});

Vue.filter('myDate', function (created) {
    return moment(created).format('hh:mm MMMM Do YYYY');
});

Vue.filter('myDatetime',function(created){
    return moment(created).format('MMMM Do YYYY, h:mm a');
});

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('chat', require('./components/Chat.vue'));
Vue.component('notification', require('./components/Notification.vue').default);
Vue.component('Order', require('./components/Order.vue').default);
Vue.component('my-order', require('./components/Myoders.vue').default);
Vue.component('myorderdetails', require('./components/MyOrderDetails.vue').default);
Vue.component('blog-user', require('./components/Blog/BlogUser.vue').default);
Vue.component('blog-content', require('./components/Blog/BlogContent.vue').default);
Vue.component('profile', require('./components/profile.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
    data: {
        search: ''
    },
    methods: {
        searchit: _.debounce(() => {
            Fire.$emit('searching');
        }, 1000),

    }
});
