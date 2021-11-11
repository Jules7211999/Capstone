<template>
        <div class="justify-content-center align-items-center w-100 row">
                <div class="col-3">
                     <img :src="url" alt="" srcset="" class="w-100 rounded image">
                </div>
                <div class="col-3">
                    <input type="file" name="image"  class="font-weight-bold" @change="onFileChange">
                </div>
             </div>
</template>
<script>
export default {
    data(){
        return{
            url:"/img/add-file-fish.png"
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
    min-width: 10rem;
}
</style>

