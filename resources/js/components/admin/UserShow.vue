<template>
<div class="w-100 h-100">
    <div class>
         <img :src="'/img/'+profile.profile_image" alt="" class="w-25">
    </div>
   
    <span>{{profile.name}}</span>
    <span>{{profile.address}}</span>
    <span>{{profile.phone_number}}</span>
    <span>{{profile.birthdate}}</span>
    <span>{{profile.gender}}</span>
    <span>{{profile.email_verified_at}}</span>
    <span>{{profile.email}}</span>
    <span>{{profile.created_at}}</span>
</div>
    
</template>

<script>
export default {
    props:['data'],
    data(){
        return{
         profile:this.data
        }
    },
   mounted(){
       
   }
}
</script>

<style scoped>
span{
    font-weight: bold;
}
</style>