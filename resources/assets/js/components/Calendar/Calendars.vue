<template>
    <div class="row">
        <h2 style="margin-top: 20px">My Calendars</h2>
        <hr>

        <h4>Add a Calendar</h4>
        <label>Title</label>
        <input type="text" name="name" v-model="calendar.title"/>
        <label>Description</label>
        <input type="text" name="main_color" v-model="calendar.description"/>
        <label>Begun At</label>
        <input type="date" name="name" v-model="calendar.begun_at"/>
        <label>Finished At</label>
        <input type="date" name="main_color" v-model="calendar.finished_at"/>
        <label>Type</label>
        <select name="calendar_type_id" v-model="calendar.calendar_type_id">
            <option v-for="calendar_type in calendar_types" v-bind:value="calendar_type.id">{{ calendar_type.name }}</option>
        </select>
        <br>
        <a class="button primary" @click.prevent="createCalendar">Add</a>
        <a class="button secondary" @click.prevent="updateCalendar">Edit</a>

        <div style="height: 30px"></div>

        <h4>All Calendars</h4>
        <hr>
        <table></table>
        <table>
            <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Begun at</th>
                <th>Finished at</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="calendar in calendars">
                <td>{{ calendar.title }}</td>
                <td>{{ calendar.description }}</td>
                <td>{{ calendar.begun_at }}</td>
                <td>{{ calendar.finished_at }}</td>
                <td>
                    <a @click.prevent="showCalendar(calendar.id)" class="button tiny secondary">Edit</a>
                    <a @click.prevent="deleteCalendar(calendar)" class="button tiny alert">Delete</a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                calendars: [],
                calendar_types: [],
                calendar: {
                    id: '',
                    title: '',
                    description: '',
                    begun_at: '',
                    finished_at: '',
                    location: '',
                    calendar_type_id: '',
                    team_id: 1
                }
            };
        },

        mounted: function() {
            this.fetchCalendarList();
            this.fetchCalendarTypeList();
        },

        methods: {
            fetchCalendarList: function() {
                this.$http.get('api/calendar/index').then(function (response) {
                    this.calendars = response.data
                });
            },

            fetchCalendarTypeList: function() {
                this.$http.get('api/calendar/type/index').then(function (response) {
                    this.calendar_types = response.data
                });
            },

            createCalendar: function () {
                this.$http.post('api/calendar/store', this.calendar)
                this.calendar.title = ''
                this.calendar.description = ''
                this.calendar.begun_at = ''
                this.calendar.finished_at = ''
                this.calendar.location = ''
                this.calendar.calendar_type_id = ''
                this.fetchCalendarList()
            },

            updateCalendar: function(id) {
                this.$http.put('api/calendar/update?id=' + id, this.calendar)
                this.calendar.id = ''
                this.calendar.title = ''
                this.calendar.description = ''
                this.calendar.begun_at = ''
                this.calendar.finished_at = ''
                this.calendar.location = ''
                this.calendar.calendar_type_id = ''
                this.fetchCalendarList()
            },

            showCalendar: function(id) {
                this.$http.get('api/calendar/show?id=' + id).then(function(response) {
                    this.calendar = response.data
                })
            },

            deleteCalendar: function (calendar) {
                if (confirm('Delete calendar : '+ calendar.name +' ?')) {
                    this.$http.post('api/calendar/destroy?id=' + calendar.id)
                    var index = this.calendars.indexOf(calendar)
                    this.calendars.splice(index, 1)
                }
            },
        }
    }


</script>