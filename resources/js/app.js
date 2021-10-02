

require('./bootstrap');

window.Vue = require('vue').default;



Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('create-form', require('./components/CreateForm.vue').default);
Vue.component('directory', require('./components/Directory.vue').default);


const app = new Vue({
    el: '#app',
});
