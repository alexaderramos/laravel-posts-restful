<template>
<div class="row">

    <post-list-default-component
        :key="currentPage"
        :pCurrentPage="currentPage"
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
            this.getPosts();
        },
        data(){
            return{
                postSelected:"",//{title:'',content:''},
                posts:[],
                total:0,
                currentPage:1
            }
        },
        methods:{
            postClick(post){
                this.postSelected = post
            },
            getPosts(){
                let url='/api/post?page='+this.currentPage
                fetch(url)
                    .then(response => {
                        return response.json();
                    })
                    .then( (json) => {
                        this.posts = json.data.data;
                        this.total = json.data.last_page;
                    });
            },
            getCurrentPage(currentPage){
                this.currentPage = currentPage;
                this.getPosts();
            }
        }
    }
</script>

<style scoped>

</style>
