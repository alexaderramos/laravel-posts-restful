<template>
<div class="row">
    <div v-if="post">
        <div class="col-md-12">
            <div  class="card">
                <img class="card-img-top" :src="post.url_image" alt="">
                <div class="card-body">
                    <h4 class="card-title">{{post.title}}</h4>
                    <router-link :to="{name:'post-category', params:{category_id:post.category.id}}" class="btn btn-success" >{{post.category.title}}</router-link>
                    <p class="card-text">{{post.content}}</p>
                </div>
            </div>
        </div>
    </div>
    <div v-else>
        <h1>No existe</h1>
    </div>

</div>
</template>

<script>
    export default {
        created() {
            this.getPost()
        },
        data(){
            return{
                post:""/*{
                    id:0,
                    title:'',
                    content:'',
                    category:{
                        id:0,
                        title:''
                    }
                }*/
            }
        },
        methods:{
            getPost(){

                let url ="/api/post/"+this.$route.params.id;
                fetch(url)
                    .then(response => {
                        return response.json();
                    })
                    .then((json) => {
                        this.post = json.data
                    });
            }
        }
    }
</script>

<style scoped>

</style>
