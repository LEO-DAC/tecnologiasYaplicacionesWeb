import Vue from 'vue'
import router from './router'
import { store } from './store'
import VueI18n from 'vue-i18n'
import en from './locales/en.json'
import es from './locales/es.json'

import './assets/css/vendor/dropzone.min.css'
import './assets/css/vendor/bootstrap.min.css'
import './assets/css/sass/themes/piaf.light.blue.scss'

import { defaultLocale, localeOptions, firebaseConfig } from '@/constants/config'
import BootstrapVue from 'bootstrap-vue'
import Notifications from '@/components/Common/Notification'
import Breadcrumb from '@/components/Common/Breadcrumb'
import RefreshButton from '@/components/Common/RefreshButton'
import Colxx from '@/components/Common/Colxx'
import vuePerfectScrollbar from 'vue-perfect-scrollbar'

/* OPTINAL -begin */
import contentmenu from 'v-contextmenu'
import VCalendar from 'v-calendar'
import 'v-calendar/lib/v-calendar.min.css'
import firebase from 'firebase/app'
import 'firebase/auth'
/* OPTINAL -end */
import App from './App'

Vue.use(BootstrapVue)
Vue.use(VueI18n)

const messages = { en: en, es: es }
const locale = (localStorage.getItem('currentLanguage') && localeOptions.filter(x => x.id === localStorage.getItem('currentLanguage')).length > 0) ? localStorage.getItem('currentLanguage') : defaultLocale
const i18n = new VueI18n({
  locale: locale,
  fallbackLocale: 'en',
  messages
})

Vue.use(Notifications)
Vue.component('piaf-breadcrumb', Breadcrumb)
Vue.component('b-refresh-button', RefreshButton)
Vue.component('b-colxx', Colxx)
Vue.component('vue-perfect-scrollbar', vuePerfectScrollbar)

/* OPTINAL -begin */
Vue.use(require('vue-shortkey'))
Vue.use(contentmenu)
Vue.use(VCalendar, {
  firstDayOfWeek: 2, // ...other defaults,
  formats: {
    title: 'MMM YY',
    weekdays: 'WW',
    navMonths: 'MMMM',
    input: ['L', 'YYYY-MM-DD', 'YYYY/MM/DD'],
    dayPopover: 'L'
  },
  datePickerShowDayPopover: false,
  popoverExpanded: true,
  popoverDirection: 'bottom'
})
firebase.initializeApp(firebaseConfig)
/* OPTINAL -end  */

export default new Vue({
  el: '#app',
  i18n,
  router,
  store,
  render: h => h(App)
})
