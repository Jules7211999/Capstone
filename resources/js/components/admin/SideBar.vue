<template>
        <div class="w-75 h-100 ml-5 pl-4">
            <div>
                <div class="position-relative toggle-position ">
                        <img src="/img/x.svg" alt="" class="btn-toggle" v-if="shownav==true" @click="shownav = !shownav">
                        <img src="/img/next.svg" alt="" class="btn-toggle" v-if="shownav==false"  @click="shownav = !shownav">
                </div>
            </div>
                    <div class="font-weight-bold mt-5 border-right ml-4" :class="{'w-25':shownav == false }">
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
                            <img src="/img/placeholder.svg" alt="" class ="icon mr-3">
                                <span v-if="shownav">
                                    Map
                                </span>
                            
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
    /* span:hover{
        text-decoration: underline;
       
        transition: 0.2s ease;
    } */
    .toggle-position{
        left: 90%;
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