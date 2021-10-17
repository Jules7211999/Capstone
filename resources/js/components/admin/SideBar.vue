<template>
        <div class=" ml-5 pl-4 border-right " :class="{'col-xl-1 col-lg-2 col-md-2':shownav == false,'col-xl-2 col-lg-3 col-md-3':shownav == true}">              
                        <img src="/img/Close.svg" alt="" class="nav-open" v-if="shownav==true" @click="shownav = !shownav">
                        <img src="/img/Open.svg" alt="" class="nav-close" v-if="shownav==false"  @click="shownav = !shownav">
                    <div class="font-weight-bold mt-5 ml-4">
                        <div class="mb-5">
                            <a href="/dashboard" class="text-secondary">
                                <img src="/img/Messages.svg" alt="" class ="icon pr-3">
                                    <span v-if="shownav">
                                        Dashboard
                                    </span>
                            </a>
                        </div>
                        <div class=" mb-5">
                            <a href="/messages" class="text-secondary">
                            <img src="/img/Messages.svg" alt="" class ="icon pr-3">
                                <span v-if="shownav">
                                    Messages
                                </span>     
                            </a>
                        </div>
                        <div class=" mb-5">
                            <a href="/user" class="text-secondary">
                                <img src="/img/Users.svg" alt="" class ="icon pr-3">
                                    <span v-if="shownav">
                                        Users
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
                        <a href="/emergency" class="text-secondary">
                            <div class=" mb-5"> 
                                <img src="/img/SOS.svg" alt="" class ="icon pr-3"> 
                                    <span v-if="shownav">
                                        SOS
                                    </span>
                            </div>
                        </a>
                        <a href="/post" class="text-secondary">
                            <div class=" mb-5">
                                <img src="/img/Post.svg" alt="" class ="icon pr-3">
                                    <span v-if="shownav">
                                        Post
                                    </span>
                            </div>
                        </a>
                    </div>
    </div>

</template>

<script>
export default {
    data(){
        return{
            shownav:true
        }
    },
    mounted(){
        
    }
}
</script>

<style scoped>
    .nav-open,.nav-close{
        position: relative;
        width: 2rem;
    }
    .nav-open{
        left: 90%;
    }
    .nav-close{
        left: 80%;
    }   
    .btn-toggle{
        width: 10%;
        min-width: 2rem;
    }
    .icon{
        width: 15%;
        min-width: 2rem;
    }
   
</style>