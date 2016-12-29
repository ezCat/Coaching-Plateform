<template>
    <div class="row">
        <h2 style="margin-top: 20px">My Players</h2>
        <hr>

        <h4>Add a Player</h4>
        <label>First Name</label>
        <input type="text" name="name" v-model="player.first_name"/>
        <label>Last Name</label>
        <input type="text" name="link" v-model="player.last_name"/>
        <label>Birth Date</label>
        <input type="date" name="name" v-model="player.birth_date"/>
        <label>Experience</label>
        <input type="text" name="name" v-model="player.experience"/>
        <label>Position</label>
        <select v-model="player.position">
            <option>PG</option>
            <option>SG/SF</option>
            <option>PF/C</option>
        </select>
        <br>
        <a class="button primary" @click.prevent="createPlayer">Add</a>
        <a class="button secondary" @click.prevent="updatePlayer">Edit</a>

        <div style="height: 30px"></div>

        <h4>All Players</h4>
        <hr>
        <ul class="list-group">
            <dl v-for="player in players">
                <dt>{{ player.last_name }} {{ player.first_name }}</dt>
                <dd>{{ player.birth_date }}</dd>
                <dd>{{ player.position }}</dd>
                <dd>{{ player.experience }}</dd>
                <dd>
                    <a @click.prevent="showPlayer(player.id)" class="button tiny secondary">Edit</a>
                    <a @click.prevent="deletePlayer(player)" class="button tiny alert">Delete</a>
                </dd>
            </dl>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                players: [],
                player: {
                    id: '',
                    last_name: '',
                    first_name: '',
                    birth_date: '',
                    experience: '',
                    position: ''
                }
            };
        },

        mounted: function() {
            this.fetchPlayerList();
        },

        methods: {
            fetchPlayerList: function() {
                this.$http.get('api/player/index').then(function (response) {
                    this.players = response.data
                });
            },

            createPlayer: function () {
                this.$http.post('api/player/store', this.player)
                this.player.last_name = ''
                this.player.first_name = ''
                this.player.birth_date = ''
                this.player.experience = ''
                this.player.position = ''
                this.fetchPlayerList()
            },

            updatePlayer: function(id) {
                this.$http.put('api/player/update?id=' + id, this.player)
                this.player.id = ''
                this.player.last_name = ''
                this.player.first_name = ''
                this.player.birth_date = ''
                this.player.experience = ''
                this.player.position = ''
                this.fetchPlayerList()
            },

            showPlayer: function(id) {
                this.$http.get('api/player/show?id=' + id).then(function(response) {
                    this.player = response.data
                })
            },

            deletePlayer: function (player) {
                if (confirm('Delete player : '+ player.name +' ?')) {
                    this.$http.post('api/player/destroy?id=' + player.id)
                    var index = this.players.indexOf(player)
                    this.players.splice(index, 1)
                }
            },
        }
    }


</script>