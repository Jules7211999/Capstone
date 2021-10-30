<template>
     <div>
         <div class="mb-3 d-flex justify-content-center ">
             <img :src="url" alt="" srcset="" class="w-50 rounded-circle">
         </div>
         <div class="row">
            <div class="col d-flex justify-content-center ">
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