<template>
    <div class="row">
        <h2 style="margin-top: 20px">My Gyms</h2>
        <hr>

        <h4>Add a Gym</h4>
        <label>Name</label>
        <input type="text" name="name" v-model="gym.name"/>
        <label>Address</label>
        <input type="text" name="link" v-model="gym.adress"/>
        <label>Location</label>
        <input type="text" name="link" v-model="gym.location"/>
        <br>
        <a class="button primary" @click.prevent="createGym">Add</a>
        <a class="button secondary" @click.prevent="updateGym">Edit</a>

        <div style="height: 30px"></div>

        <h4>All Gyms</h4>
        <hr>
        <ul class="list-group">
            <dl v-for="gym in gyms">
                <dt>{{ gym.name }}</dt>
                <dd>{{ gym.adress }}</dd>
                <dd>{{ gym.location }}</dd>
                <dd>
                    <a @click.prevent="showGym(gym.id)" class="button tiny secondary">Edit</a>
                    <a @click.prevent="deleteGym(gym)" class="button tiny alert">Delete</a>
                </dd>
            </dl>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                gyms: [],
                gym: {
                    id: '',
                    name: '',
                    adress: '',
                    location: ''
                }
            };
        },

        mounted: function() {
            this.fetchGymList();
        },

        methods: {
            fetchGymList: function() {
                this.$http.get('api/gym/index').then(function (response) {
                    this.gyms = response.data
                });
            },

            createGym: function () {
                this.$http.post('api/gym/store', this.gym)
                this.gym.name = ''
                this.gym.adress = ''
                this.gym.location = ''
                this.fetchGymList()
            },

            updateGym: function(id) {
                this.$http.put('api/gym/update?id=' + id, this.gym)
                this.gym.id = ''
                this.gym.name = ''
                this.gym.adress = ''
                this.gym.location = ''
                this.fetchGymList()
            },

            showGym: function(id) {
                this.$http.get('api/gym/show?id=' + id).then(function(response) {
                    this.gym = response.data
                })
            },

            deleteGym: function (gym) {
                if (confirm('Delete gym : '+ gym.name +' ?')) {
                    this.$http.post('api/gym/destroy?id=' + gym.id)
                    var index = this.gyms.indexOf(gym)
                    this.gyms.splice(index, 1)
                }
            },
        }
    }


</script>