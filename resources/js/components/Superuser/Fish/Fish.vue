<template>
    <div>
        <div class="w-100 p-5 d-flex justify-content-between">
            <a href="/fish/create">
                <div>
                    <img src="/img/add-fish.png" alt="" class="adduser">
                    <label class="font-weight-bold text-secondary"></label>
                </div>
            </a>
            <div class="w-50 text-right pr-5">
                <form @submit.prevent="search()">
                    <input type="text" v-model="query" placeholder="Search" class="border-bottom border-secondary border-top-0 border-right-0 border-left-0 font-weight-bold text-secondary pr-5">
                </form>  
            </div>    
        </div>
        <div class="d-flex flex-wrap w-100 h-100 ">
            <div v-for="d in data" class="fish-container  border mr-2 rounded pl-5 pr-5 pt-2 text-center text-secondary font-weight-bold  pb-2 shadow">
                <img :src="'https://capstone-salvador-bucket.s3.us-east-2.amazonaws.com/'+ d.image" alt="" class="image">
                <div class="w-100 pt-5 d-flex align-items-center justify-content-center">{{d.common_name}}</div>
                <div class="w-100 pt-2 d-flex align-items-center justify-content-center">{{d.local_name}}</div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            data: {},
            query:""
        }
    },
    mounted(){
        axios.get('/getFish')
        .then(data => this.data = data.data)
        .catch(error => console.log(error));
    }
}
</script>

<style scoped>
input:focus{
    outline: none;  

}
input{
    background: transparent;
    width: 50%;
}
.adduser{
    width: 2rem;
}
.adduser:hover{
    width: 3rem;
    transition: 0.5s ease-out;
}

.fish-container{
    border-radius: 1.5rem;
    width: 20rem;
    height: 20rem;
}
.image{
    width: 100%;
    height: 50%;
    padding-top: 1rem;
}
</style>