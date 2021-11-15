/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


Vue.component('admin-container-component',require('./components/Superuser/MainContainer.vue').default);
Vue.component('mapbox-component',require('./components/Superuser/Mapbox.vue').default);
Vue.component('user-component',require('./components/Superuser/User/User.vue').default);
Vue.component('dashboard-component',require('./components/Superuser/Dashboard.vue').default);
Vue.component('user-show-component',require('./components/Superuser/User/UserShow.vue').default);
Vue.component('admin-sos-component',require('./components/Superuser/Sos/Sos.vue').default);
Vue.component('sos-show-component',require('./components/Superuser/Sos/SosShow.vue').default);
Vue.component('profile-component',require('./components/Superuser/Profile/Profile.vue').default);
Vue.component('admin-component',require('./components/Superuser/Admin/Admin.vue').default);
Vue.component('admin-show-component',require('./components/Superuser/Admin/AdminShow.vue').default);
Vue.component('fish-component',require('./components/Superuser/Fish/Fish.vue').default);
Vue.component('catch-component',require('./components/Superuser/Catch/Catch.vue').default);
Vue.component('lgu-component',require('./components/Superuser/Lgu/Lgu.vue').default);
Vue.component('fish-show-component',require('./components/Superuser/Fish/FishShow.vue').default);
Vue.component('catch-show-component',require('./components/Superuser/Catch/CatchShow.vue').default);

//component only
Vue.component('profile-image-component',require('./components/Superuser/Components/ProfileImage.vue').default);
Vue.component('fish-image-component',require('./components/Superuser/Components/FishImage.vue').default);
Vue.component('dropdown-component',require('./components/Superuser/Components/Dropdown.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
