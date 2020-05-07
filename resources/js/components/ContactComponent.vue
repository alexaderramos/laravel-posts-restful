<template>
<div>
    <div class="row">
        <h1 class="mx-auto">Contacto</h1>
    </div>
    <div class="row">
        <div class="mx-auto col-md-6">
            <div class="card ">
                <div class="card-header">
                    <img src="/images/logo.png" class="logo_200 mx-auto d-block">
                </div>
                <div class="card-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" v-model="name" >Nombre</span>
                        </div>
                        <input type="text"  class="form-control">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" v-model="lastName" >Apellido</span>
                        </div>
                        <input type="text"  class="form-control">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" type="email" v-model="email">Email</span>
                        </div>
                        <input type="text"  class="form-control">
                    </div>
                    <div class="input-group mb-3">
                        <textarea name="" id="" cols="30" rows="4" class="form-control" placeholder="Comentarios..." v-model="content"></textarea>
                    </div>

                    <div class=" mb-3 ">
                        <button class="btn btn-primary float-right" @click="saveContact">Enviar <i class="fas fa-arrow-right  "></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        name: "ContactComponent",
        created() {

        },
        data(){
            return{
                name:"",
                lastName:"",
                email:"",
                content:""
            }
        },
        methods:{
            saveContact(){
                /*let url='';
                fetch(url).then(response =>{
                    return response.json()
                })*/
            }
        }
    }
</script>

<style scoped>
    .logo_200{
        width: 200px;
    }
</style>
