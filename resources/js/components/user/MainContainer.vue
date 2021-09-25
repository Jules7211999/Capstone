<template>
<div class="w-100 h-100">
    <div class="  w-100 d-flex justify-content-between align-items-center pt-2" v-if="show == false">
        <div class="w-25 pl-3">
            <img src="/img/logo.svg" alt="" class="w-50">
        </div> 
        <div class="w-25 pr-3 text-right">
            <img src="/img/Menu.svg" alt="" class="w-25" @click="show = !show">
        </div>
    </div>
    <div class="w-100 h-100" >
        <slot></slot>
    </div>
     <div class="sidebar-wrapper w-100 h-100" v-if="show">
            <sidebar @closeModal ="show = !show"/>
    </div>
</div>
</template>

<script>
import sidebar from './Sidebar.vue';
export default {
    data(){
        return{
            show: false
        }
    },
    components:{sidebar}
    
}
</script>

<style scoped>
.sidebar-wrapper{
    position: fixed;
    top: 0;
}
.slot{
    z-index: -1;
}

</style>
