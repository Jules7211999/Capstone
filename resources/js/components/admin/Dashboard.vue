<template>
    <div class="w-100 h-75 rounded mt-4 border border-secondary p-5 d-flex justify-content-center">
       
           <div class="w-25 h-50 border-secondary mr-3 r">
           </div>
           <div class="w-25 h-50 border-secondary r">
           </div>
       </div>
    
</template>

<script>
export default {
    mounted(){
        console.log("dashboard mounted");
    }
}
</script>

<style scoped>
  
   .r{
       background-color: blue;
   }
</style>