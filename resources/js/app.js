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


Vue.component('admin-container-component',require('./components/admin/MainContainer.vue').default);
Vue.component('messages-component',require('./components/admin/Message/Messages.vue').default);
Vue.component('mapbox-component',require('./components/admin/Mapbox.vue').default);
Vue.component('user-component',require('./components/admin/User/User.vue').default);
Vue.component('dashboard-component',require('./components/admin/Dashboard.vue').default);
Vue.component('user-show-component',require('./components/admin/User/UserShow.vue').default);
Vue.component('post-component',require('./components/admin/Post/Post.vue').default);
Vue.component('admin-sos-component',require('./components/admin/Sos/Sos.vue').default);
Vue.component('sos-show-component',require('./components/admin/Sos/SosShow.vue').default);
Vue.component('profile-component',require('./components/admin/Profile/Profile.vue').default);
Vue.component('admin-component',require('./components/admin/admin/Admin.vue').default);



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
