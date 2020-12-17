/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.Fire=new Vue();


import VueSweetalert2 from 'vue-sweetalert2';
import Swal from 'sweetalert2';
import VueRouter from 'vue-router';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

Vue.use(VueRouter);
Vue.use(BootstrapVue);
Vue.use(IconsPlugin);
Vue.use(VueSweetalert2, options);

const options = {
  confirmButtonColor: '#5bc0de',
  cancelButtonColor: '#ff7674',
 
};
window.Swal=Swal;
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 2000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})
window.Toast=Toast;


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

 
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('test', require('./components/Test.vue').default);
Vue.component('order', require('./components/Order.vue').default);
Vue.component('food', require('./components/Food.vue').default);
Vue.component('food-item', require('./components/FoodItem.vue').default);
Vue.component('food-category', require('./components/FoodCategory.vue').default);

import ExampleComponent from './components/ExampleComponent.vue';
import Test from './components/Test.vue';
import Order from './components/Order.vue';
import Food from './components/Food.vue';
import FoodItem from './components/FoodItem.vue';
import FoodCategory from './components/FoodCategory.vue';
 

export const routes = [{
  path: '/example-component',
  component: ExampleComponent,
  name: 'example'
},
{
  path: '/test',
  component: Test,
  name: 'test' 
},
{
  path: '/order',
  component: Order,
  name: 'order' 
},
{
  path: '/food',
  component: Food,
  name: 'food' 
},
{
  path: '/food-item',
  component: FoodItem,
  name: 'food-item' 
},
{
  path: '/food-category',
  component: FoodCategory,
  name: 'food-category' 
},
]

 const router = new VueRouter({
  
    mode: 'hash',
    routes,
   // short for `routes: routes`,haha
  })
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
}).$mount("#app");
