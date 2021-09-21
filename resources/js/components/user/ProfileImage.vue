<template>
<div class="col-5 pt-3">
    <div class="w-100">
        <img :src="'/img/'+profileImg" alt="" class="w-100">
    </div>
     <div class="w-25">
        <input type="file" id="profile_image" name="profile_image" class="d.none"> 
         <label for="profile_image"><img src="/img/Edit.svg" class="w-75"></label>
    </div>
</div>
</template>
<script>
export default {
    props:["profileImg"],
    data(){
       return{

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