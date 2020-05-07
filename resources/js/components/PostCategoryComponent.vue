<template>
<div>
    <h1>{{category.title}}</h1>
    <div class="row">
        <post-category-default-component
            :posts="posts"
            :total="total"
            @getCurrentPage="getCurrentPage"
        ></post-category-default-component>

    </div>
</div>
</template>

<script>
    export default {
        name: "PostCategoryComponent",
        created() {
            this.getPosts();
        },
        data(){
            return{
                posts:[],
                category:"",
                total:0,
                currentPage:1
            }
        },
        methods:{
            postClick(post){
                //this.postSelected = post
            },
            getPosts(){
                let url = "/api/post/"+this.$route.params.category_id+"/category?page="+this.currentPage
                fetch(url)
                    .then(response => {
                        return response.json();
                    })
                    .then( (json) =>{
                        this.posts = json.data.posts.data;
                        this.total = json.data.posts.last_page;
                        this.category=json.data.category
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
