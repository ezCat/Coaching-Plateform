require('./bootstrap');

Vue.component('teams', require('./components/Teams.vue'));

const app = new Vue({
    el: '#app'
});
