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
            <div v-for="d in data" class="fish-container d-flex flex-wrap border mr-2 rounded pl-5 pr-5 pt-2 d-flex justify-content-center text-secondary font-weight-bold w-25 pb-2 shadow">
                    <div>
                        {{d.common_name}}
                    </div>
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

.fish-container:hover{
    background: #86cbf7;
    border-radius: 1.5rem;
    padding: 3rem;
    transition: ease-in-out 0.2s;
}
</style>