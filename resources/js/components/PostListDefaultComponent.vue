<template>
<div class="row">
    <div v-for="post in posts" :key="post.title" class="col-md-3">
        <div  class="card">
            <img class="card-img-top" :src="'/images/'+post.image" alt="">
            <div class="card-body">
                <h4 class="card-title">{{post.title}}</h4>
                <p class="card-text">{{post.content}}</p>
                <a href="#" class="btn btn-primary" @click.prevent="postClick(post)">Ver resumen</a>

                <router-link :to="{name:'detail', params:{id:post.id}}" class="btn btn-success">Detalle</router-link>

            </div>
        </div>
    </div>
    <post-modal-component :post="postSelected"></post-modal-component>



</div>
</template>

<script>
    export default {
        name: "PostListDefaultComponent",
        props:['posts'],
        created() {

        },
        data(){
            return{
                postSelected:"",//{title:'',content:''},
            }
        },
        methods:{
            postClick(post){
                this.postSelected = post
            },
        }
    }
</script>

<style scoped>

</style>
