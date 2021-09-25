<template>
<div class="w-100 h-100">
    <div v-for="d in data" class="d-flex justify-content-center w-100">
        <div class="p-4 row w-75 d-flex justify-content-between font-weight-bold text-secondary list">
                <a :href="'/emergency/'+d.id"><div >{{d.user.name}}</div></a>
                <div>{{d.created_at}}</div>
        </div>
    </div>
</div>
    
</template>

<script>
export default {
    data(){
        return{
            data: {}
        }
    },
methods:{
    getSos(){
        axios.get('/getSos')
        .then(data => this.data = data.data)
        .catch(error => console.log(error.response.data.message));
    },
},
mounted(){
    this.getSos();
},
created(){
    Echo.channel('SOS.notification')
    .listen('SOSevent', (e) => {
        this.getSos();
    });
}    
}
</script>

<style scoped>
.list{
    border-bottom: 1px solid #6c757d;
}
</style>