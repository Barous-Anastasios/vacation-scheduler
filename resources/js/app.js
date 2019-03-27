require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

$(document).ready(function(){
    $('select').formSelect();
    $('.sidenav').sidenav();
    $('.dropdown-trigger').dropdown();
});

const app = new Vue({
    el: '#app'
});
