/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */



require('./bootstrap');

window.Vue = require('vue').default;

import VueApexCharts from 'vue-apexcharts'
Vue.use(VueApexCharts)

Vue.component('apexchart', VueApexCharts)
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


Vue.component('admin-container-component',require('./components/MainContainer.vue').default);
Vue.component('mapbox-component',require('./components/Mapbox.vue').default);
Vue.component('user-component',require('./components/User/User.vue').default);
Vue.component('dashboard-component',require('./components/Dashboard.vue').default);
Vue.component('user-show-component',require('./components/User/UserShow.vue').default);
Vue.component('admin-sos-component',require('./components/Sos/Sos.vue').default);
Vue.component('sos-show-component',require('./components/Sos/SosShow.vue').default);
Vue.component('admin-component',require('./components/Admin/Admin.vue').default);
Vue.component('admin-show-component',require('./components/Admin/AdminShow.vue').default);
Vue.component('fish-component',require('./components/Fish/Fish.vue').default);
Vue.component('catch-component',require('./components/Catch/Catch.vue').default);
Vue.component('lgu-component',require('./components/Lgu/Lgu.vue').default);
Vue.component('fish-show-component',require('./components/Fish/FishShow.vue').default);
Vue.component('catch-show-component',require('./components/Catch/CatchShow.vue').default);
Vue.component('monitor-component',require('./components/Monitor/Monitor.vue').default);
Vue.component('sub-monitor-component',require('./components/Monitor/SubMonitor.vue').default);
Vue.component('show-monitor-component',require('./components/Monitor/ShowMonitor.vue').default);

//component only
Vue.component('profile-image-component',require('./components/Components/ProfileImage.vue').default);
Vue.component('fish-image-component',require('./components/Components/FishImage.vue').default);
Vue.component('dropdown-component',require('./components/Components/Dropdown.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
