<template>
        <div class="w-100 p-5 d-flex justify-content-between">
            <a href="/barangay/create">
                <div>
                    <img src="/img/add-barangay.png" alt="" class="icon">
                    <label class="font-weight-bold text-secondary"></label>
                </div>
            </a>
            <div class="w-50 text-right pr-5">
                <form @submit.prevent="search()">
                    <input type="text" v-model="query" placeholder="Search" class="border-bottom border-secondary border-top-0 border-right-0 border-left-0 font-weight-bold text-secondary pr-5">
                </form>  
                
            </div>
    </div>
</template>

<style scoped>
.icon{
    width: 2rem;
}
</style>