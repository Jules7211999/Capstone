<template>
     <div class="mb-3">
         <div class="row w-100 row align-items-center">
            <div class="col-3">
                 <img :src="url" alt="" srcset="" class="w-100 rounded-circle image">
            </div>
            <div class="col-9">
                     <input type="file" name="image"  class="font-weight-bold" @change="onFileChange">
            </div>
         </div>
     </div>
</template>
<script>
export default {
    data(){
        return{
            url:"/img/profile-user.svg"
        }
    },
    methods:{
        onFileChange(e) {
            const file = e.target.files[0];
            this.url = URL.createObjectURL(file);
    }
    }
}
</script>
<style scoped>
image{
    overflow: hidden;
}
</style>