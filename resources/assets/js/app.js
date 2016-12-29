require('./bootstrap');

Vue.component('navbar', require('./components/Layout/Navbar.vue'));
Vue.component('teams', require('./components/Team/Teams.vue'));
Vue.component('documents', require('./components/Document/Documents.vue'));
Vue.component('schedules', require('./components/Schedule/Schedules.vue'));
Vue.component('reminders', require('./components/Reminder/Reminders.vue'));

const app = new Vue({
    el: '#app'
});
