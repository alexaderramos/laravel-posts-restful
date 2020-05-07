<template>
<div class="row">

    <post-list-default-component :posts="posts" ></post-list-default-component>
    <router-link to="/">Inicio</router-link>
</div>
</template>

<script>
    export default {
        name: "PostListComponent",
        created() {
            this.getPost();
        },
        data(){
            return{
                postSelected:"",//{title:'',content:''},
                posts:[]
            }
        },
        methods:{
            postClick(post){
                this.postSelected = post
            },
            getPost(){
                fetch('/api/post')
                    .then(response => {
                        return response.json();
                    })
                    .then( (json) => {
                        this.posts = json.data.data;
                    });
            }
        }
    }
</script>

<style scoped>

</style>
