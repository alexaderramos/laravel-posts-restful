<template>
<div>
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
    <div class="row mt-3" v-if="total > 0">
        <div class="col-md-12">
            <v-pagination
                v-model="currentPage"
                :page-count="total"
                :classes="bootstrapPaginationClasses"
                :labels="paginationAnchorTexts"
            ></v-pagination>
        </div>
    </div>
</div>
</template>

<script>
    import vPagination from 'vue-plain-pagination'
    export default {
        name: "PostListDefaultComponent",
        props:['posts','total'],
        components: { vPagination },
        created() {

        },
        data(){
            return{
                postSelected:"",//{title:'',content:''},
                currentPage: 1,
                bootstrapPaginationClasses: {
                    ul: 'pagination',
                    li: 'page-item',
                    liActive: 'active',
                    liDisable: 'disabled',
                    button: 'page-link'
                },
                paginationAnchorTexts: {
                    first: '&laquo;',
                    prev: '&lsaquo;',
                    next: '&rsaquo;',
                    last: '&raquo;'
                }
            }
        },
        methods:{
            postClick(post){
                this.postSelected = post
            },
        },
        watch:{
            currentPage(newVal, oldVal){
                console.log(newVal)
                this.$emit('getCurrentPage',newVal);
            }
        }
    }
</script>

<style scoped>

</style>
