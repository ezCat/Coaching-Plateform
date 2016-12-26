<template>
    <h1>My Teams</h1>
</template>

<script>
    export default {
        data: function() {
            return {
                edit: false,
                list: [],
                team: {
                    id: '',
                    body: ''
                }
            };
        },

        ready: function() {
            this.fetchTeamList();
        },

        methods: {
            fetchTeamList: function() {
                this.$http.get('api/teams').then(function (response) {
                    this.list = response.data
                });
            },

            createTeam: function () {
                this.$http.post('api/team/store', this.team)
                this.team.body = ''
                this.edit = false
                this.fetchTeamList()
            },

            updateTeam: function(id) {
                this.$http.patch('api/team/' + id, this.team)
                this.team.body = ''
                this.edit = false
                this.fetchTeamList()
            },

            showTeam: function(id) {
                this.$http.get('api/team/' + id).then(function(response) {
                    this.team.id = response.data.id
                    this.team.body = response.data.body
                })
                this.$els.teaminput.focus()
                this.edit = true
            },

            deleteTeam: function (id) {
                this.$http.delete('api/team/' + id)
                this.fetchTeamList()
            },
        }
    }
</script>