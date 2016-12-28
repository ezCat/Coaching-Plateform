require('./bootstrap');

Vue.component('navbar', require('./components/Layout/Navbar.vue'));
Vue.component('teams', require('./components/Team/Teams.vue'));
Vue.component('list-teams', require('./components/Team/TeamsList.vue'));
Vue.component('documents', require('./components/Document/Documents.vue'));
Vue.component('list-documents', require('./components/Document/DocumentsList.vue'));

const app = new Vue({
    el: '#app'
});
