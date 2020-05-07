<template>
<div>
    <h1>{{category.title}}</h1>
    <div class="row">
        <post-category-default-component :posts="posts" ></post-category-default-component>

        <router-link to="/">Inicio</router-link>

    </div>
</div>
</template>

<script>
    export default {
        name: "PostCategoryComponent",
        created() {
            this.getPost();
        },
        data(){
            return{
                posts:[],
                category:""
            }
        },
        methods:{
            postClick(post){
                //this.postSelected = post
            },
            getPost(){
                let url = "/api/post/"+this.$route.params.category_id+"/category"
                fetch(url)
                    .then(response => {
                        return response.json();
                    })
                    .then( (json) =>{
                        this.posts = json.data.posts.data;
                        this.category=json.data.category
                    });
            }
        }
    }
</script>

<style scoped>

</style>
