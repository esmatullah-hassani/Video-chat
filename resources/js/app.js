require('./bootstrap');

require('alpinejs');
import Vue from 'vue';
import App from './components/App';
import router from './routes/api.route';
 const app = new Vue({
   el: '#app',
   router,
   components:{
    App
   },

 });