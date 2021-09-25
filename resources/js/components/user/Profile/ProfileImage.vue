<template>
<div class="col-5 pt-3">
    <div class="w-100">
        <img :src="'/img/'+profileImg" alt="" class="w-100">
    </div>
     <div class="m-0 p-0 row d-flex justify-content-end">
         <div class="col-9 d-flex justify-content-end text-right">
            <input type="file" id="profile_image" @change= "imageChange()" name="profile_image" class="d.none"> 
            <label for="profile_image"><img src="/img/Edit.svg" class="w-50 "></label>
         </div>
    </div>
</div>
</template>
<script>
export default {
    methods:{
        imageChange(e){
             this.file = e.target.files[0];
            console.log(file);
        }
    },
    props:["profileImg"],
    data(){
       return{
           file : null
       }
    }
}
</script>
<style scoped>
    input[type="file"]{
    width: 0.1px;
	height: 0.1px;
	opacity: 0;
	overflow: hidden;
	position: absolute;
	z-index: -1;
    }
   
</style>