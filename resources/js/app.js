
require('./bootstrap');

window.Vue = require('vue');


Vue.component('example-component', require('./components/ExampleComponent.vue').default);


const app = new Vue({
    el: '#app',
});
var $ = require('jquery');


function init(){


}


$(document).ready(init);
