<template>
<div>
    <div class="w-100 p-5 d-flex justify-content-between">
            <a href="/user/create">
                <div>
                    <img src="/img/add-user.png" alt="" class="adduser">
                    <label class="font-weight-bold text-secondary"></label>
                </div>
            </a>
            <div class="w-50 text-right pr-5">
                <form @submit.prevent="search()">
                    <input type="text" v-model="query" placeholder="Search" class="border-bottom border-secondary border-top-0 border-right-0 border-left-0 font-weight-bold text-secondary pr-5">
                </form>  
                
            </div>
    </div>
    <div class="d-flex flex-wrap w-100 h-100">
        <div v-for="u in user.data"  :key="u.id" class="p-2 d-flex flex-wrap">
            
                <div class="m-2 p-2 shadow-sm border user-container">
                    <div class ="text-center mt-3">
                            <img :src="'/img/'+ u.profile_image" alt="" class="w-50">
                        <div class="font-weight-bold pt-3">
                            <label>{{u.name}}</label>
                            <div>
                                <img src="/img/restore.png"  class="w-25" @click="restore(u.id)">
                            </div>
                        </div>
                    </div>    
                </div>
        
        </div>
    </div>
</div>
</template>

<script>
export default {
    data(){
        return{
            user:{},
            query:''
        }
    },
    mounted(){
        axios.get('/getSoftDeletedUsers').then(data => this.user = data)
        .catch(error => console.log(error))
    },
    methods:{
        search(){
        axios.post('/userSearchTrash',{
                search : this.query,
            })
            .then(data => this.user = data)
            .catch(error =>console.log(error.errors))
        },
        restore(id){
            
             axios.post('/userRestore',{
             userId : id
             })
            .catch(error => console.log(error.message));
        }
    }
}
</script>

<style scoped>
.user-container{
    width: 150px;
    height: 200px;
    border-radius: 1.5rem;
    padding: 5rem;
}
/* .user-container:hover{
     width: 200px;
    height: 250px;
    border-radius: 1.5rem;
    padding: 3rem;
    transition: ease-in-out 0.2s;
} */
span{
    font-size: 1.5rem;
    word-wrap: break-word;
}
.modal{
    top: 50%;
    right: 50%;
    background-color: aqua;
    z-index: 12;
}
.adduser{
    width: 2rem;
}
.adduser:hover{
    width: 3rem;
    transition: 0.5s ease-out;
}
input:focus{
    outline: none;  
    width: 60%;
    transition: ease-out 0.5s;
}
input{
    background: transparent;
    width: 50%;
}
</style>