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
    </div>
</template>

<script>
export default {
    
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
</style>