<template>
    <div>
        <h4>All Teams</h4>
        <ul class="list-group">
            <li class="list-group-item" v-for="team in teams">
                {{ team.name }}
            </li>
        </ul>
    </div>
</template>
<script>
    export default {
        data: function() {
            return {
                teams: []
            };
        },

        mounted: function() {
            this.fetchTeamList();
        },

        methods: {
            fetchTeamList: function() {
                this.$http.get('api/team/index').then(function (response) {
                    this.teams = response.data
                });
            }
    }
</script>
