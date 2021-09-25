<template>
    <div class="w-75 h-100 sidebar d-flex">
         <div class="w-25 pr-3 close">
            <img src="/img/Close.svg" alt="" class="w-25" @click="closeModal()">
        </div>
        <div >
            <ul class="pt-5">
                <li>
                     <img :src="'/img/'+userData.profile_image" alt="" class="w-25">
                </li>
                <li class="mt-3">
                    <span class="font-weight-bold name text-secondary">{{userData.name}}</span>
                </li>
                <li>
                     <span class="email text-secondary">{{userData.email}}</span>
                </li>
            </ul>
            <ul class="pt-5"> 
                <a href="/profile">
                    <li class="text-secondary pt-2">
                        Profile
                    </li>
                </a>
                    
                <li class="text-secondary pt-2">
                    Announcement
                </li>
                <li class="text-secondary pt-2">
                    Distress Signal
                </li>
            </ul>
            <ul class="logout">
                <a href="/logout">
                    <li class="text-secondary font-weight-bold">
                        Log Out
                    </li>
                </a>
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