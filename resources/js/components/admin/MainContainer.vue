<template>
    <div >
        <topbar/>
        <div class="row w-100 vh-100">
        <sidebar/>
        <div class="col">
                <slot></slot>      
        </div>   

    </div>
    </div>
</template>

<script>
import topbar from './TopBar.vue';
import sidebar from './SideBar.vue';
export default {
    components:{topbar,sidebar}
}
</script>

<style scoped>

</style>