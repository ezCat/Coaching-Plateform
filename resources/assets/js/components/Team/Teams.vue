<template>
    <div class="row">
        <h2 style="margin-top: 20px">My Teams</h2>
        <hr>

        <h4>Add a Team</h4>
        <label>Name</label>
        <input type="text" name="name" v-model="team.name"/>
        <label>Club</label>
        <select name="club_id" v-model="team.club_id">
            <option v-for="club in clubs" v-bind:value="club.id">{{ club.name }}</option>
        </select>
        <label>Category</label>
        <select name="category_id" v-model="team.category_id">
            <option v-for="category in categories" v-bind:value="category.id">{{ category.name }}</option>
        </select>
        <br>
        <a class="button primary" @click.prevent="createTeam">Add</a>
        <a class="button secondary" @click.prevent="updateTeam">Edit</a>

        <div style="height: 30px"></div>

        <h4>All Teams</h4>
        <hr>
        <ul class="list-group">
            <dl v-for="team in teams">
                <dt>{{ team.name }}</dt>
                <dd>
                    <a @click.prevent="showTeam(team.id)" class="button tiny secondary">Edit</a>
                    <a @click.prevent="deleteTeam(team)" class="button tiny alert">Delete</a>
                </dd>
            </dl>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                teams: [],
                clubs: [],
                categories: [],
                team: {
                    id: '',
                    name: '',
                    category_id: '',
                    club_id: ''
                }
            };
        },

        mounted: function() {
            this.fetchTeamList();
            this.fetchClubList();
            this.fetchCategoryList();
        },

        methods: {
            fetchTeamList: function() {
                this.$http.get('api/team/index').then(function (response) {
                    this.teams = response.data
                });
            },

            fetchClubList: function() {
                this.$http.get('api/club/index').then(function (response) {
                    this.clubs = response.data
                });
            },

            fetchCategoryList: function() {
                this.$http.get('api/category/index').then(function (response) {
                    this.categories = response.data
                });
            },

            createTeam: function () {
                this.$http.post('api/team/store', this.team)
                this.team.name = ''
                this.team.category_id = ''
                this.team.club_id = ''
                this.fetchTeamList()
            },

            updateTeam: function(id) {
                this.$http.put('api/team/update?id=' + id, this.team)
                this.team.id = ''
                this.team.name = ''
                this.team.category_id = ''
                this.team.club_id = ''
                this.fetchTeamList()
            },

            showTeam: function(id) {
                this.$http.get('api/team/show?id=' + id).then(function(response) {
                    this.team = response.data
                })
            },

            deleteTeam: function (team) {
                if (confirm('Delete this '+ team.name +' ?')) {
                    this.$http.post('api/team/destroy?id=' + team.id)
                    var index = this.teams.indexOf(team)
                    this.teams.splice(index, 1)
                }
            },
        }
    }

</script>