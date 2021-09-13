<template>
        <div class="d-flex p-3 align-items-center h-100">
                     <div class="col-12 d-flex justify-content-center ">
                         <img :src="'/img/'+userData.profile_image" alt="" class="w-100">
                     </div>    
        </div>
</template>

<script>
export default {
    data(){
        return{
            userData:{}
        }
    },
    mounted(){
           axios.get('/getUserProfile')
       .then(data => this.userData = data.data)
    }
}
</script>

<style scoped>
    button{
        background: transparent;

    }
</style>