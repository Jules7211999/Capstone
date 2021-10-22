<template>
    <div class="w-100 main m-0 p-0">
        <topbar :auth="authname"/>
        <navdir :nav="nav"/>
        <div class="row w-100 h-75 m-0 p-0">
            <sidebar :role="role"/>
                 <div class="col">
                    <slot></slot>      
                </div>   

        </div>
    </div>
</template>

<script>
import topbar from './TopBar.vue';
import sidebar from './SideBar.vue';
import navdir from './NavDirectory.vue';
export default {
    props:['authname','role','nav'],
    components:{topbar,sidebar,navdir}
}

</script>

<style scoped>
.main{
    height: 85%;
}
</style>