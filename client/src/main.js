import Vue from 'vue'
import App from './App.vue'

import VueRouter from 'vue-router'

import './style.css'

import Home from '@/components/Home.vue'
import Create from '@/components/Create.vue'
import Detail from '@/components/Detail.vue'

Vue.config.productionTip = false
Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    redirect: '/home'
  },
  {
    path: '/home',
    name: 'Home',
    component: Home
  },
  {
    path: '/lands/create',
    name: 'Create',
    component: Create
  },
  {
    path: '/lands/edit/:id',
    name: 'Edit',
    component: Create
  },
  {
    path: '/lands/:id',
    name: 'Detail',
    component: Detail
  },

]

const router = new VueRouter({
  mode: 'history',
  routes
})

new Vue({
  router,
  render: h => h(App),
}).$mount('#app')
