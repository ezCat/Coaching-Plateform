<template>
    <div class="row">
        <h2 style="margin-top: 20px">My Schedules</h2>
        <hr>

        <h4>Add a Schedule</h4>
        <label>Game Day</label>
        <input type="date" name="date_match" v-model="schedule.date_match"/>
        <label>Place</label>
        <select name="place_id" v-model="schedule.place_id">
            <option v-for="place in places" v-bind:value="place.id">{{ place.name }}</option>
        </select>
        <label>Club</label>
        <select name="club_id" v-model="schedule.club_id">
            <option v-for="club in clubs" v-bind:value="club.id">{{ club.name }}</option>
        </select>
        <br>
        <a class="button primary" @click.prevent="createSchedule">Add</a>
        <a class="button secondary" @click.prevent="updateSchedule">Edit</a>

        <div style="height: 30px"></div>

        <h4>All Schedules</h4>
        <hr>
        <ul class="list-group">
            <dl v-for="schedule in schedules">
                <dt>{{ schedule.date_match }}</dt>
                <dd>
                    <a @click.prevent="showSchedule(schedule.id)" class="button tiny secondary">Edit</a>
                    <a @click.prevent="deleteSchedule(schedule)" class="button tiny alert">Delete</a>
                </dd>
            </dl>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                schedules: [],
                clubs: [],
                places: [],
                schedule: {
                    id: '',
                    date_match: '',
                    club_id: '',
                    place_id: '',
                    team_id: 1
                }
            };
        },

        mounted: function() {
            this.fetchScheduleList();
            this.fetchClubList();
            this.fetchPlaceList();
        },

        methods: {
            fetchScheduleList: function() {
                this.$http.get('api/schedule/index').then(function (response) {
                    this.schedules = response.data
                });
            },

            fetchClubList: function() {
                this.$http.get('api/club/index').then(function (response) {
                    this.clubs = response.data
                });
            },

            fetchPlaceList: function() {
                this.$http.get('api/place/index').then(function (response) {
                    this.places = response.data
                });
            },

            createSchedule: function () {
                this.$http.post('api/schedule/store', this.schedule)
                this.schedule.date_match = ''
                this.schedule.club_id = ''
                this.schedule.place_id = ''
                this.fetchScheduleList()
            },

            updateSchedule: function(id) {
                this.$http.put('api/schedule/update?id=' + id, this.schedule)
                this.schedule.id = ''
                this.schedule.date_match = ''
                this.schedule.club_id = ''
                this.schedule.place_id = ''
                this.fetchScheduleList()
            },

            showSchedule: function(id) {
                this.$http.get('api/schedule/show?id=' + id).then(function(response) {
                    this.schedule = response.data
                })
            },

            deleteSchedule: function (schedule) {
                if (confirm('Delete schedule : '+ schedule.name +' ?')) {
                    this.$http.post('api/schedule/destroy?id=' + schedule.id)
                    var index = this.schedules.indexOf(schedule)
                    this.schedules.splice(index, 1)
                }
            },
        }
    }
</script>