<template>
    <div class="row w-100 h-100 ">
        <div class="col-3">
            <button @click="show = true">Send Message</button>
        </div>
        <div v-if="show" class="w-50 h-75 Modal">
             <div class="w-100 text-right mt-2 pr-3">
            <img src="/img/close.svg" alt="" class="close-modal" @click="show = !show">
        </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            show: false
        }
    },

}
</script>

<style scoped>
.Modal{
    position: absolute;
    background: aqua;
    top: 50%;
    left: 50%;
    transform:translate(-50% -50%);
    
}
img{
    width: 2rem;
}
</style>