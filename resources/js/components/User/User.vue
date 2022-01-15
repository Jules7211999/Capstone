<template>
<div>
    <div class="w-100 p-5 d-flex justify-content-between">
            <a href="/user/create">
                <div v-if="role != 'SuperUser'">
                    <img src="/img/add-user.png" alt="" class="adduser">
                    <label class="font-weight-bold text-secondary"></label>
                </div>
            </a>
    </div>
      <div class="p-5 w-100 text-left ">
                <div class="row align-items-center">
                    <div class="col-5">
                        <form @keypress="search()">
                            <input type="text" v-model="query" placeholder="Search" class="border-bottom border-secondary border-top-0 border-right-0 border-left-0 font-weight-bold text-secondary pr-5">
                        </form>
                    </div> 
                   
                    <div class="col-2 d-flex align-items-center pb-2">
                       <img src="/img/back.png" alt="" class="arrow" @click="userchange()"><span class="font-weight-bold text-secondary ml-2 mr-2">{{usertype}}</span><img src="/img/forward.png" alt="" class="arrow" @click="userchange()">
                    </div>
                </div>
    </div>
      <div class="d-flex flex-wrap w-100 h-100">
        <div v-for="u in user.data"  :key="u.id" class="m-2 d-flex flex-wrap">
            <div v-if="u.deleted_at == null ">
                <a :href="'/user/'+u.id" class="text-secondary">
                    <div class="m-2 p-2 shadow-sm border user-container">
                        <div class ="text-center mt-3">
                               <img :src="'https://capstone-salvador-bucket.s3.us-east-2.amazonaws.com/'+ u.profile_image" alt="" class="image">
                            <div class="font-weight-bold mt-3 pt-3">
                                <label>{{u.name}}</label>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
              <div v-if="u.deleted_at != null">
                 <div class="m-2 p-2 shadow-sm border user-container">
                        <div class ="text-center mt-3">
                               <img :src="'https://capstone-salvador-bucket.s3.us-east-2.amazonaws.com/'+ u.profile_image" alt="" class="image">
                            <div class="font-weight-bold mt-3 pt-3">
                                <label>{{u.name}}</label>
                            </div>
                            <div>
                                <img src="/img/restore.png" alt="" class="arrow" @click="restore(u.id)">
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
    props:['role'],
    data(){
        return{
            user:{},
            query:'',
            usertype:"Active",
            
        }
    },
    mounted(){
        axios.get('/getUser').then(data => this.user = data);
    },
    methods:{
        search(){
                axios.post('/userSearch',{
                search : this.query,
                type: this.usertype
            })
            .then(data => this.user = data)
            .catch(error =>console.log(error.errors.message))
        },
        userchange(){
            if(this.usertype == "Active"){
                this.usertype = "Deactivated"
                 axios.get('/getUserDeleted').then(data => this.user = data);
            }
            else{
                this.usertype = "Active"
                 axios.get('/getUser').then(data => this.user = data);
            }
        },
        restore(id){
            axios.post('/restore',{
                id: id
            }).then(data => console.log(data))
              axios.get('/getUserDeleted').then(data => this.user = data);
        },
    }
}
</script>

<style scoped>
.image{
    border-radius: 50%;
    width: 75%;
}
.user-container{
    width: 250px;
    height: 300px;
    border-radius: 1.5rem;
    padding: 5rem;
}
.user-container:hover{
    background: #86cbf7;
    border-radius: 1.5rem;
    padding: 3rem;
    transition: ease-in-out 0.2s;
}
span{
    font-size: 1.5rem;
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
    width: 80%;
    transition: ease-out 0.5s;
}
input{
    background: transparent;
    width: 60%;
}
.arrow{
    width: 1.5rem;
}
span{
    font-size: 1rem;
}
</style>