<template>
    <div class="row">
        <h2 style="margin-top: 20px">My Clubs</h2>
        <hr>

        <h4>Add a Club</h4>
        <label>Name</label>
        <input type="text" name="name" v-model="club.name"/>
        <label>Main Color</label>
        <input type="text" name="main_color" v-model="club.main_color"/>
        <label>Gym</label>
        <select name="gym_id" v-model="club.gym_id">
            <option v-for="gym in gyms" v-bind:value="gym.id">{{ gym.name }}</option>
        </select>
        <br>
        <a class="button primary" @click.prevent="createClub">Add</a>
        <a class="button secondary" @click.prevent="updateClub">Edit</a>

        <div style="height: 30px"></div>

        <h4>All Clubs</h4>
        <hr>
        <ul class="list-group">
            <dl v-for="club in clubs">
                <dt>{{ club.name }}</dt>
                <dd>Main color : {{ club.name }}</dd>
                <dd>{{ club.gym_id }}</dd>
                <dd>
                    <a @click.prevent="showClub(club.id)" class="button tiny secondary">Edit</a>
                    <a @click.prevent="deleteClub(club)" class="button tiny alert">Delete</a>
                </dd>
            </dl>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                clubs: [],
                gyms: [],
                club: {
                    id: '',
                    name: '',
                    main_color: '',
                    gym_id: ''
                }
            };
        },

        mounted: function() {
            this.fetchClubList();
            this.fetchGymList();
        },

        methods: {
            fetchClubList: function() {
                this.$http.get('api/club/index').then(function (response) {
                    this.clubs = response.data
                });
            },

            fetchGymList: function() {
                this.$http.get('api/gym/index').then(function (response) {
                    this.gyms = response.data
                });
            },

            createClub: function () {
                this.$http.post('api/club/store', this.club)
                this.club.name = ''
                this.club.main_color = ''
                this.club.gym_id = ''
                this.fetchClubList()
            },

            updateClub: function(id) {
                this.$http.put('api/club/update?id=' + id, this.club)
                this.club.id = ''
                this.club.name = ''
                this.club.main_color = ''
                this.club.gym_id = ''
                this.fetchClubList()
            },

            showClub: function(id) {
                this.$http.get('api/club/show?id=' + id).then(function(response) {
                    this.club = response.data
                })
            },

            deleteClub: function (club) {
                if (confirm('Delete club : '+ club.name +' ?')) {
                    this.$http.post('api/club/destroy?id=' + club.id)
                    var index = this.clubs.indexOf(club)
                    this.clubs.splice(index, 1)
                }
            },
        }
    }


</script>