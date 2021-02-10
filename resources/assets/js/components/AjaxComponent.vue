<template>
    <div class="container">
        <div class="row">
            <button @click="update" class="btn btn-default text mb-1" v-if="!is_refresh">Обновить {{id}}...</button>
            <span class="badge bedge-primary mb-1" v-if="is_refresh">Обновление...</span>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>URL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="url in urldata">
                            <td>{{url.title}}</td>
                            <td>{{url.url}}</td>
                        </tr>
                    </tbody>
                </table>
        </div>
    </div>
</template>

<script>
    export default {
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

                // var app = this
                // axios.get('/start/get-json').then(function(response){
                //     console.log(response)
                //     app.urldata = response.data
                //     app.is_refresh = false
                //     app.id++
                // });
            }
        }
    }
</script>
