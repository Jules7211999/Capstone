<template>
        <div class=" ml-5 pl-4 border-right " :class="{'col-1':shownav == false,'col-2':shownav == true}">              
                        <img src="/img/x.svg" alt="" class="nav-open" v-if="shownav==true" @click="shownav = !shownav">
                        <img src="/img/next.svg" alt="" class="nav-close" v-if="shownav==false"  @click="shownav = !shownav">
                    <div class="font-weight-bold mt-5 ml-4">
                        <div class="mb-5 link">
                            <a href="/dashboard" class="text-secondary">
                                <img src="/img/dashboard.svg" alt="" class ="icon mr-3">
                                    <span v-if="shownav">
                                        Dashboard
                                    </span>
                            </a>
                        </div>
                        <div class=" mb-5 link">
                            <a href="/messages" class="text-secondary">
                            <img src="/img/send.svg" alt="" class ="icon mr-3">
                                <span v-if="shownav">
                                    Messages
                                </span>     
                            </a>
                        </div>
                        <div class=" mb-5 link">
                            <a href="/user" class="text-secondary">
                                <img src="/img/hook.svg" alt="" class ="icon mr-3">
                                    <span v-if="shownav">
                                        Users
                                    </span>
                            </a>
                        </div>
                        <div class=" mb-5 link">
                            <a href="/map" class="text-secondary">
                            <img src="/img/placeholder.svg" alt="" class ="icon mr-3">
                                <span v-if="shownav">
                                    Map
                                </span>
                            </a>
                        </div>
                        <div class=" mb-5 link"> 
                            <img src="/img/chat.svg" alt="" class ="icon mr-3"> 
                                <span v-if="shownav">
                                    SOS
                                </span>
                        </div>
                        <div class=" mb-5 link">
                            <img src="/img/sticky-notes.svg" alt="" class ="icon mr-3">
                                <span v-if="shownav">
                                    Post
                                </span>
                        </div>
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
        console.log("sidebar mounted");
    }
}
</script>

<style scoped>
    .nav-open,.nav-close{
        width: 2rem;
    }
    .nav-open{
        left: 100%;
    }
    .nav-close{
        left: 95%;
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