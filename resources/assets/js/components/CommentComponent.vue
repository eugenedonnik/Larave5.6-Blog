<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <p> <b>Author:</b> Eugene Donnik; <b>Created date:</b> 28.01.2021</p>
                        </div>
                        <p>{{body}}</p>
                        <div v-if="loggedin === 'true'">
                            <button>Add Comment</button>
                            <button>Delete</button>
                            <button>Edit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            loggedin: String,
            body: String
        },
        data: function(){
            return {
                urldata: [],
                is_refresh: false,
                id: 0
            }
        },
        methods: {
            update: function(){
                this.is_refresh = true
                axios.get('/start/get-json').then((response) => {
                    console.log(response)
                    this.urldata = response.data
                    this.is_refresh = false
                    this.id++
                });
            }
        }
    }
</script>
