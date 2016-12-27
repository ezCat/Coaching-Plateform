<template>
<div>
    <h1>My Teams</h1>

    <h4>Add a Team</h4>
        <label>Name</label>
        <input type="text" name="name" class="form-control" v-model="team.name"/>
        <label>Club</label>
        <select class="form-control" name="club_id" v-model="team.club_id">
            <option v-for="club in clubs" v-bind:value="club.id">{{ club.name }}</option>
        </select>
        <label>Category</label>
        <select class="form-control" name="category_id" v-model="team.category_id">
            <option v-for="category in categories" v-bind:value="category.id">{{ category.name }}</option>
        </select>
        <br>
        <button class="btn btn-success" type="submit" @click="createTeam">Add</button>
        <button class="btn btn-primary" type="submit" @click="updateTeam">Edit</button>
    <br>

    <h4>All Teams</h4>
    <ul class="list-group">
        <li class="list-group-item" v-for="team in teams">
            {{ team.name }}
            <button @click="showTeam(team.id)" class="btn btn-primary btn-xs">Edit</button>
            <button @click="deleteTeam(team.id, team.name)" class="btn btn-danger btn-xs">Delete</button>
        </li>
    </ul>
    <button class="btn" @click="fetchTeamList">Get All Data</button>
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
            },

            updateTeam: function(id) {
                this.$http.put('api/team/update?id=' + id, this.team)
                this.team.id = ''
                this.team.name = ''
                this.team.category_id = ''
                this.team.club_id = ''
            },

            showTeam: function(id) {
                this.$http.get('api/team/show?id=' + id).then(function(response) {
                    this.team = response.data
                })
            },

            deleteTeam: function (id, name) {
                if (confirm('Delete this '+ name +' ?')) {
                    this.$http.post('api/team/destroy?id=' + id)
                }
            },
        }
    }
</script>