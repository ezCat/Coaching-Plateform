<template>
    <div class="row">
        <h2 style="margin-top: 20px">My Documents</h2>
        <hr>

        <h4>Add a Document</h4>
        <label>Name</label>
        <input type="text" name="name" v-model="document.name"/>
        <label>Link</label>
        <input type="text" name="link" v-model="document.link"/>
        <br>
        <a class="button primary" @click.prevent="createDocument">Add</a>
        <a class="button secondary" @click.prevent="updateDocument">Edit</a>

        <div style="height: 30px"></div>

        <h4>All Documents</h4>
        <hr>
        <ul class="list-group">
            <dl v-for="document in documents">
                <dt>{{ document.name }}</dt>
                <dd>{{ document.link }}</dd>
                <dd>
                    <a @click.prevent="showDocument(document.id)" class="button tiny secondary">Edit</a>
                    <a @click.prevent="deleteDocument(document)" class="button tiny alert">Delete</a>
                </dd>
            </dl>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                documents: [],
                document: {
                    id: '',
                    name: '',
                    link: '',
                    team_id: 1
                }
            };
        },

        mounted: function() {
            this.fetchDocumentList();
        },

        methods: {
            fetchDocumentList: function() {
                this.$http.get('api/document/index').then(function (response) {
                    this.documents = response.data
                });
            },

            createDocument: function () {
                this.$http.post('api/document/store', this.document)
                this.document.name = ''
                this.document.link = ''
                this.fetchDocumentList()
            },

            updateDocument: function(id) {
                this.$http.put('api/document/update?id=' + id, this.document)
                this.document.id = ''
                this.document.name = ''
                this.document.link = ''
                this.fetchDocumentList()
            },

            showDocument: function(id) {
                this.$http.get('api/document/show?id=' + id).then(function(response) {
                    this.document = response.data
                })
            },

            deleteDocument: function (document) {
                if (confirm('Delete document : '+ document.name +' ?')) {
                    this.$http.post('api/document/destroy?id=' + document.id)
                    var index = this.documents.indexOf(document)
                    this.documents.splice(index, 1)
                }
            },
        }
    }


</script>