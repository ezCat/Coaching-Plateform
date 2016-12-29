<template>
    <div class="row">
        <h2 style="margin-top: 20px">My Injuries</h2>
        <hr>

        <h4>Add a Injury</h4>
        <label>Date injury</label>
        <input type="date" name="date_injury" v-model="injury.date_injury"/>
        <label>Recover Date (expected)</label>
        <input type="date" name="date_recover_injury" v-model="injury.date_recover_injury"/>
        <label>Player</label>
        <select name="player_id" v-model="injury.player_id">
            <option v-for="player in players" v-bind:value="player.id">{{ player.first_name }}, {{ player.last_name }}</option>
        </select>
        <label>Pathology</label>
        <select name="pathology_id" v-model="injury.pathology_id">
            <option v-for="pathology in pathologies" v-bind:value="pathology.id">{{ pathology.name }}</option>
        </select>
        <br>
        <a class="button primary" @click.prevent="createInjury">Add</a>
        <a class="button secondary" @click.prevent="updateInjury">Edit</a>

        <div style="height: 30px"></div>

        <h4>All Injuries</h4>
        <hr>
        <ul class="list-group">
            <dl v-for="injury in injuries">
                <dt>{{ injury.player_id }}</dt>
                <dd>{{ injury.pathology_id }}</dd>
                <dd>{{ injury.date_injury }}</dd>
                <dd>{{ injury.date_recover_injury }}</dd>
                <dd>
                    <a @click.prevent="showInjury(injury.id)" class="button tiny secondary">Edit</a>
                    <a @click.prevent="deleteInjury(injury)" class="button tiny alert">Delete</a>
                </dd>
            </dl>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                injuries: [],
                players: [],
                pathologies: [],
                injury: {
                    id: '',
                    date_injury: '',
                    date_recover_injury: '',
                    player_id: '',
                    pathology_id: '',
                    team_id: 1
                }
            };
        },

        mounted: function() {
            this.fetchInjuryList();
            this.fetchPathologyList();
            this.fetchPlayerList();
        },

        methods: {
            fetchInjuryList: function() {
                this.$http.get('api/injury/index').then(function (response) {
                    this.injuries = response.data
                });
            },

            fetchPlayerList: function() {
                this.$http.get('api/player/index').then(function (response) {
                    this.players = response.data
                });
            },

            fetchPathologyList: function() {
                this.$http.get('api/pathology/index').then(function (response) {
                    this.pathologies = response.data
                });
            },

            createInjury: function () {
                this.$http.post('api/injury/store', this.injury)
                this.injury.date_injury = ''
                this.injury.date_recover_injury = ''
                this.injury.player_id = ''
                this.injury.pathology_id = ''
                this.injury.team_id = ''
                this.fetchInjuryList()
            },

            updateInjury: function(id) {
                this.$http.put('api/injury/update?id=' + id, this.injury)
                this.injury.id = ''
                this.injury.date_injury = ''
                this.injury.date_recover_injury = ''
                this.injury.player_id = ''
                this.injury.pathology_id = ''
                this.injury.team_id = ''
                this.fetchInjuryList()
            },

            showInjury: function(id) {
                this.$http.get('api/injury/show?id=' + id).then(function(response) {
                    this.injury = response.data
                })
            },

            deleteInjury: function (injury) {
                if (confirm('Delete this injury ?')) {
                    this.$http.post('api/injury/destroy?id=' + injury.id)
                    var index = this.injuries.indexOf(injury)
                    this.injuries.splice(index, 1)
                }
            },
        }
    }


</script>