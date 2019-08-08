//require('./bootstrap');
window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

window.Vue = require('vue');
import moment from 'moment';

import { Form, HasError, AlertError } from 'vform'

import { VueMaskDirective } from 'v-mask'
Vue.directive('mask', VueMaskDirective);

import swal from 'sweetalert2'

window.swal = swal;

const toast = swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
});


//Dialog to delete item
const dialog_delete = swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success',
      cancelButton: 'btn btn-danger'
    },
    buttonsStyling: false,
  })

window.dialog_delete = dialog_delete;


window.toast = toast;


window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)


import VueRouter from 'vue-router'
Vue.use(VueRouter)

import VueProgressBar from 'vue-progressbar'

Vue.use(VueProgressBar, {
  color: 'rgb(143, 255, 199)',
  failedColor: 'red',
  height: '5px'
})



let routes = [
    {path: '/dashboard_pm', component: require('./components/Dashboard_pm.vue') },
    {path: '/profile', component: require('./components/Profile.vue') },
    {path: '/users', component: require('./components/Users.vue') },
		{path: '/proyectos', component: require('./components/Proyectos.vue') },
    {path: '/desarrolladores',component:  require('./components/Desarrolladores.vue')},
    {path: '/empresas',component:  require('./components/Empresas.vue')},
    {path: '/pagos',component:  require('./components/Pagos.vue')},
    {path: '/clientes',component:  require('./components/Clientes.vue')},
    {path: '/issues',component:  require('./components/Issues.vue')},
    {path: '/tareas',component:  require('./components/Tareas.vue')},
	  {path: '/tickets',component:  require('./components/Tickets.vue')},
	
		{path: '/abonos',component:  require('./components/Abonos.vue')}

  ]

const router = new VueRouter({
      mode: "history",
      routes // short for `routes: routes`
  })

Vue.filter('upText', function (text) {
  //eturn text.toUpperCase();
  return text.charAt(0).toUpperCase() + text.slice(1)
});

Vue.filter('myDate', function (created){
  return moment(created).format('MMMM Do YYYY');
});

let Fire = new Vue();

window.Fire = Fire;
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

Vue.component('lista-proyectos', require('./components/Proyectos.vue'));
Vue.component('lista-desarrolladores', require('./components/Desarrolladores.vue'));
Vue.component('lista-pagos', require('./components/Pagos.vue'));

const app = new Vue({
    el: '#app',
    router
});

