require('./bootstrap');

Vue.component('navbar', require('./components/Layout/Navbar.vue'));
Vue.component('teams', require('./components/Team/Teams.vue'));
Vue.component('list-teams', require('./components/Team/TeamsList.vue'));
Vue.component('documents', require('./components/Document/Documents.vue'));
Vue.component('list-documents', require('./components/Document/DocumentsList.vue'));
Vue.component('schedules', require('./components/Schedule/Schedules.vue'));
Vue.component('list-schedules', require('./components/Schedule/SchedulesList.vue'));

const app = new Vue({
    el: '#app'
});
