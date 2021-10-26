/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

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
Vue.component('main-component', require('./components/MainComponent.vue').default);
Vue.component('playbillcard-component', require('./components/PlaybillCardComponent.vue').default);
Vue.component('rehearsals-component', require('./components/RehearsalsComponent.vue').default);
Vue.component('rehearsalscard-component', require('./components/RehearsalsCardComponent.vue').default);
Vue.component('actorplaybill-component', require('./components/ActorPlaybillComponent.vue').default);
Vue.component('actorplaybillcard-component', require('./components/ActorPlaybillCardComponent.vue').default);
Vue.component('administrations-component', require('./components/AdministrationsComponent.vue').default);
Vue.component('administrationscard-component', require('./components/AdministrationsCardComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
