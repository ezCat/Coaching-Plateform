require('./bootstrap');

Vue.component('teams', require('./components/Team/Teams.vue'));
Vue.component('list-teams', require('./components/Team/TeamsList.vue'));

const app = new Vue({
    el: '#app'
});
