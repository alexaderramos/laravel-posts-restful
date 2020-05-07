<template>
<div>
    <h1>{{category.title}}</h1>
    <div class="row">
        <div v-for="post in posts" :key="post.title" class="col-md-3">
            <div  class="card">
                <img class="card-img-top" :src="'/images/'+post.image" alt="">
                <div class="card-body">
                    <h4 class="card-title">{{post.title}}</h4>
                    <p class="card-text">{{post.content.slice(0,200)}}</p>
                    <a href="#" class="btn btn-primary" @click.prevent="postClick(post)">Ver resumen</a>

                </div>
            </div>
        </div>

        <router-link to="/">Inicio</router-link>

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
        name: "PostCategoryDefaultComponent",
        props:['posts','total','pCurrentPage'],
        components: { vPagination },
        created() {
            this.currentPage = this.pCurrentPage
        },
        data(){
            return{
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
                },
                category:""
            }
        },
        methods:{
            postClick(post){
                //this.postSelected = post
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
