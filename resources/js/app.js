require('./bootstrap');

require('alpinejs');


window.Vue = require('vue');
import "../css/app.css";
 Vue.component('page-component', require('./components/ContentSection.vue').default);
 const app = new Vue({
   el: '#app',
 });