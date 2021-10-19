<template>
    <div class="w-100 main m-0 p-0">
        <topbar :auth="authname"/>
        <div class="row w-100 h-100 m-0 p-0">
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
    props:['authname'],
    components:{topbar,sidebar,}
}

</script>

<style scoped>
.main{
    height: 85%;
}
</style>