<template>
<div class="row">

    <post-list-default-component
        :posts="posts"
        :total="total"
        @getCurrentPage="getCurrentPage"
    ></post-list-default-component>
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
                posts:[],
                total:0
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
                        this.total = json.data.last_page;
                    });
            },
            getCurrentPage(currentPage){
                console.log("currentPage:"+currentPage)
            }
        }
    }
</script>

<style scoped>

</style>
