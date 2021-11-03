<template>
<div>
    <div class="w-100 p-5 d-flex justify-content-between">
            <a href="/admin/create">
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
        <div v-for="u in user.data"  :key="u.id" class="m-2 d-flex flex-wrap">
            <a :href="'/admin/'+u.id" class="text-secondary">
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
        axios.get('/getAdmin').then(data => this.user = data);
    },
    methods:{
        search(){
            axios.post('/adminSearch',{
                search : this.query,
            })
            .then(data => this.user = data)
            .catch(error =>console.log(error.errors.message))
        }
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
    word-wrap: break-word;
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