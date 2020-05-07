<template>
<div>
    <!-- Button trigger modal -->
   <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
        Launch
    </button>-->

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{post.title}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{post.content}}
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        name: "PostModalComponent",
        props:['post'],
        created() {
          /* setTimeout(function () {
               $('#myModal').modal('show');
           },4000)*/
        },
        watch:{
            post(newVal, oldVal){
                $('#myModal').modal('show')
                //console.log('watch'+newVal)
                //console.log('watch'+oldVal)
            }
        }
    }
</script>

<style scoped>

</style>
