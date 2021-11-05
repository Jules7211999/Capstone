<template>
        <div class=" ml-5 pl-4 border-right col-xl-2 col-lg-3 col-md-3">                   
                    <div class="font-weight-bold mt-5 ml-4 " >
                        <div class="mb-5">
                            <a href="/dashboard" class="text-secondary">
                                <img src="/img/Dash.svg" alt="" class ="icon pr-3">
                                    <span v-if="shownav">
                                        Dashboards
                                    </span>
                            </a>
                        </div>
                        <div class=" mb-5">
                            <a href="/user" class="text-secondary">
                                <img src="/img/Users.svg" alt="" class ="icon pr-3">
                                    <span v-if="shownav">
                                        Fisherman
                                    </span>
                            </a>
                        </div>
                        <div v-if="authrole == 'SuperUser'" class=" mb-5">
                            <a href="/lgu" class="text-secondary">
                                <img src="/img/building.png" alt="" class ="icon pr-3">
                                    <span v-if="shownav">
                                        LGU
                                    </span>
                            </a>
                        </div>
                        <div v-if="authrole == 'SuperUser'" class=" mb-5">
                            <a href="/admin" class="text-secondary">
                                <img src="/img/admin.png" alt="" class ="icon pr-3">
                                    <span v-if="shownav">
                                        Admin
                                    </span>
                            </a>
                        </div>
                        <div class=" mb-5">
                            <a href="/map" class="text-secondary">
                            <img src="/img/Map.svg" alt="" class ="icon pr-3">
                                <span v-if="shownav">
                                    Map
                                </span>
                            </a>
                        </div>
                        <div class=" mb-5"> 
                            <a href="/emergency" class="text-secondary">
                                <img src="/img/SOS.svg" alt="" class ="icon pr-3"> 
                                    <span v-if="shownav">
                                        SOS
                                    </span>
                            </a>
                        </div>
                        <div v-if="authrole == 'SuperUser'" class="mb-5"> 
                            <a href="/fish" class="text-secondary">
                                <img src="/img/fish.png" alt="" class ="icon pr-3"> 
                                    <span v-if="shownav">
                                        Fish
                                    </span>
                            </a>
                        </div>
                        <div v-if="authrole != 'SuperUser'" class="mb-5"> 
                            <a href="/fish" class="text-secondary">
                                <img src="/img/fish.png" alt="" class ="icon pr-3"> 
                                    <span v-if="shownav">
                                        Catch Monitoring
                                    </span>
                            </a>
                        </div>
                </div>                  
    </div>

</template>

<script>
export default {
    props:['role'],
    data(){
        return{
            shownav:true,
            authrole: this.role,
            showtrash: false
        }
    },
    mounted(){
        
    }
}
</script>

<style scoped>
    .icon{
        width: 15%;
        min-width: 2rem;
    }
    .trash{
        color: #FB2E2E;
    }
</style>