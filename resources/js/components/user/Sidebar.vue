<template>
    <div class="w-75 vh-100 sidebar d-flex">
         <div class="w-25 pr-3 close">
            <img src="/img/Close.svg" alt="" class="w-50" @click="closeModal()">
        </div>
        <div >
            <ul class="pt-5">
                <li>
                     <img :src="'/img/'+userData.profile_image" alt="" class="w-25">
                </li>
                <li>
                    <span class="font-weight-bold name text-secondary">{{userData.name}}</span>
                </li>
                <li>
                     <span class="email text-secondary">{{userData.email}}</span>
                </li>
            </ul>
            <ul class="mt-5"> 
                <li class="text-secondary mt-2">
                    Profile
                </li>
                <li class="text-secondary mt-2">
                    Announcement
                </li>
                <li class="text-secondary mt-2">
                    Distress Signal
                </li>
            </ul>
            <ul class="logout">
                <li class="text-secondary font-weight-bold">
                    Log Out
                </li>
            </ul>
        </div>
    </div>


</template>

<script>
export default {
    methods:{
        closeModal(){
            this.$emit("closeModal")
        }
    },
    data(){
        return{
            userData:{}
        }
    },
    mounted(){
        axios.get('/getUserProfile')
        .then(data => this.userData = data.data)
    }
}
</script>

<style scoped>

.logout{
    position: absolute;
    bottom: 2rem;
}
 li{
    list-style: none;
    font-weight: bold;
}
.name{
    font-size: 1.2rem;
}
.email{
    font-size:0.8rem;
}
.close{
    position: absolute;
    top: 1rem;
    right: 3rem;
}
.sidebar{
    background: #23272B;
    
}
</style>