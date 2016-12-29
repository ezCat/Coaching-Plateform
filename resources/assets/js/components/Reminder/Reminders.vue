<template>
    <div class="row">
        <h2 style="margin-top: 20px">My Reminders</h2>
        <hr>

        <h4>Add a Reminder</h4>
        <label>Day</label>
        <input type="text" name="day" v-model="reminder.day"/>
        <label>Title</label>
        <input type="text" name="title" v-model="reminder.title"/>
        <label>Description</label>
        <input type="text" name="description" v-model="reminder.description"/>
        <label>Icon</label>
        <input type="text" name="icon" v-model="reminder.icon"/>
        <label>Color</label>
        <input type="text" name="color" v-model="reminder.color"/>
        <br>
        <a class="button primary" @click.prevent="createReminder">Add</a>
        <a class="button secondary" @click.prevent="updateReminder">Edit</a>

        <div style="height: 30px"></div>

        <h4>All Reminders</h4>
        <hr>
        <ul class="list-group">
            <dl v-for="reminder in reminders">
                <dt>
                    <span class="[round radius secondary] label">
                        {{ reminder.day }}
                    </span>
                </dt>
                <dd>{{ reminder.title }}</dd>
                <dd>{{ reminder.description }}</dd>
                <dd>
                    <a @click.prevent="showReminder(reminder.id)" class="button tiny secondary">Edit</a>
                    <a @click.prevent="deleteReminder(reminder)" class="button tiny alert">Delete</a>
                </dd>
            </dl>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                reminders: [],
                reminder: {
                    id: '',
                    day: '',
                    description: '',
                    icon: '',
                    title: '',
                    color: '',
                    team_id: 1
                }
            };
        },

        mounted: function() {
            this.fetchReminderList();
        },

        methods: {
            fetchReminderList: function() {
                this.$http.get('api/reminder/index').then(function (response) {
                    this.reminders = response.data
                });
            },

            createReminder: function () {
                this.$http.post('api/reminder/store', this.reminder)
                this.reminder.day = ''
                this.reminder.description = ''
                this.reminder.title = ''
                this.reminder.day = ''
                this.reminder.color = ''
                this.fetchReminderList()
            },

            updateReminder: function(id) {
                this.$http.put('api/reminder/update?id=' + id, this.reminder)
                this.reminder.id = ''
                this.reminder.day = ''
                this.reminder.description = ''
                this.reminder.title = ''
                this.reminder.day = ''
                this.reminder.color = ''
                this.fetchReminderList()
            },

            showReminder: function(id) {
                this.$http.get('api/reminder/show?id=' + id).then(function(response) {
                    this.reminder = response.data
                })
            },

            deleteReminder: function (reminder) {
                if (confirm('Delete this : '+ reminder.name +' ?')) {
                    this.$http.post('api/reminder/destroy?id=' + reminder.id)
                    var index = this.reminders.indexOf(reminder)
                    this.reminders.splice(index, 1)
                }
            },
        }
    }
</script>