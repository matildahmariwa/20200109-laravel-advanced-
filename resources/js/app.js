
import ('/Users/mnjumwa/Documents/projects/blog/node_modules/bootstrap/dist/css/bootstrap.css');
import router from './routes'
import './sub'

window.Vue = require('vue');



const app = new Vue({
    el: '#app',
    router
});
