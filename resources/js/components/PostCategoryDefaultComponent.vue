<template>
<div>
    <h1>{{category.title}}</h1>
    <div class="row">
        <div v-for="post in posts" :key="post.title" class="col-md-3">
            <div  class="card">
                <img class="card-img-top" :src="'/images/'+post.image" alt="">
                <div class="card-body">
                    <h4 class="card-title">{{post.title}}</h4>
                    <p class="card-text">{{post.content}}</p>
                    <a href="#" class="btn btn-primary" @click.prevent="postClick(post)">Ver resumen</a>

                </div>
            </div>
        </div>

        <router-link to="/">Inicio</router-link>

    </div>
</div>
</template>

<script>
    export default {
        name: "PostCategoryDefaultComponent",
        props:['posts'],
        created() {

        },
        data(){
            return{

                category:""
            }
        },
        methods:{
            postClick(post){
                //this.postSelected = post
            },

        }
    }
</script>

<style scoped>

</style>
