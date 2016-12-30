import Vue from 'vue';
import VueRouter from 'vue-router';
import VueResource from 'vue-resource';

Vue.use(VueResource)
Vue.use(VueRouter)

require('./bootstrap');

const router = new VueRouter({
    mode: 'hash',
    routes: [{
        path: '/'
    }, {
        path: '/admin/teams',
        component: require('./components/Team/Teams.vue')
    }, {
        path: '/calendar',
        component: require('./components/Calendar/Calendars.vue')
    }, {
        path: '/documents',
        component: require('./components/Document/Documents.vue')
    }, {
        path: '/schedule',
        component: require('./components/Schedule/Schedules.vue')
    }, {
        path: '/reminder',
        component: require('./components/Reminder/Reminders.vue')
    }, {
        path: '/injuries',
        component: require('./components/Injury/Injuries.vue')
    }]
})

new Vue({
    el: '#app',
    router,
    render: h => h(require('./components/App.vue'))
})
