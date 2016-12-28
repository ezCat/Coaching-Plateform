require('./bootstrap');

Vue.component('navbar', require('./components/Layout/Navbar.vue'));
Vue.component('teams', require('./components/Team/Teams.vue'));
Vue.component('list-teams', require('./components/Team/TeamsList.vue'));

const app = new Vue({
    el: '#app'
});
