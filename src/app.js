import Vue from 'vue';
import '@fortawesome/fontawesome-free/js/all.min.js';

import Like from './components/Like';
import Notification from './components/Notification';
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    components:{
        Like,
        Notification
    }
});