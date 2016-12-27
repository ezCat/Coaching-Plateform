require('./bootstrap');

Vue.component('teams', require('./components/Team/Teams.vue'));

const app = new Vue({
    el: '#app'
});
