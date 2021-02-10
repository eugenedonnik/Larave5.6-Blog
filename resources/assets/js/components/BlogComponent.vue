<template>
    <div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <form @submit="formSubmit">
                                <input type="hidden" v-model="id"/>

                                <div v-if="show" id="hide">
                                    <p>{{title}}</p>
                                </div>
                                <div v-else>
                                    <input type="text" class="form-control" v-model="title">
                                </div>

                                <div v-if="loggedin === 'true'">
    <!--                                <a href="/home">Delete</a>-->
    <!--                                <a href="#" data-toggle="modal" data-target="#themeModalEdit">Edit</a>-->
    <!--                                <a href="#" v-on:click="show = !show">Edit</a>-->
                                    <br>
                                    <div v-if="show" id="hide">
                                        <button v-on:click="deleteFunc">Delete</button>
                                        <button v-on:click="edit">Edit</button>
                                    </div>
                                    <div v-else>
                                        <button v-on:click="deleteFunc">Delete</button>
                                        <button v-on:click="save">Save</button>
                                        <button v-on:click="cancel">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <div v-if="show" id="hide">
                                <p> {{this.body}} </p>
                            </div>
                            <div v-else>
                                <textarea  class="form-control h-25" rows="10"  placeholder="Theme Description"  v-model="body"></textarea>
                            </div>

                            <div v-if="loggedin === 'true'">
                                <a href="">Add Comment</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- New Theme Modal -->
        <div class="modal fade" id="themeModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Theme</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form @submit="formSubmit">
<!--                            <p>{{title}}</p>-->
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea  class="form-control h-25" rows="10"  placeholder="Theme Description"  v-model="body"></textarea>
                                <div class="invalid-feedback">
                                    Please enter a message in the textarea.
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Ok</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props : ['loggedin', 'id', 'title', 'body'],
        data: function(){
            return{
                show: true,
                tmpTitle: String,
                tmpBody: String
            }
        },
        // props : {
        //     loggedin: String,
        //     id: String,
        //     title: String,
        //     body: String
        // },
        // mounted() {
        //   console.log('Component Mounted');
        // },
        // data() {
        //     themes: []
        // },
        methods: {
            edit: function(e) {
                this.show = !this.show;
                this.tmpTitle = this.title;
                this.tmpBody = this.body;
            },
            cancel: function(e) {
              this.title = this.tmpTitle;
              this.body = this.tmpBody;
              this.show = !this.show;

            },
            save: function(e){
                let tmp1 = this.tmpTitle;
                let tmp2 = this.body;
                // alert(tmp1);

                this.show = !this.show;
            },
            deleteFunc: function(e){
                e.preventDefault();
                let isOk = confirm(`Do you want to delete the \"${this.title}\" ?`);
                if (isOk){
                    axios.post('/home/delete-blog', {
                        id: this.id
                    })
                        .then(function (response) {
                        })
                        .catch(function (error) {
                        });
                }
            },
            formSubmit(e){
                e.preventDefault();
            //     axios.post('/save-data', {
            //
            //     });
            //     title: this.title;
            //     $("#themeModalEdit").modal('hide');
            }
        }
        // mounted() {
        //   console.log('Component mounted.')
        // },
        // data() {
        //     return {
        //         loggedin: '',
        //         title: '',
        //         body: ''
        //     }
        // }

        // data: function(){
        //     return {
        //         blogName,
        //         blogText,
        //         id: 0
        //     }
        // },
        // methods: {
        //     update: function(){
        //         this.is_refresh = true
        //         axios.get('/start/get-json').then((response) => {
        //             console.log(response)
        //             this.urldata = response.data
        //             this.is_refresh = false
        //             this.id++
        //         });
        //     }
        // }
    }
</script>
