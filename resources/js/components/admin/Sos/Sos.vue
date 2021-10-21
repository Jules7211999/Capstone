<template>
<div class="w-100 h-100">
    <div v-for="d in data" class="d-flex justify-content-center w-100">
        <a :href="'/emergency/'+d.emergency_call[0].id" class="w-100">
            <div class="p-4 row w-75 d-flex justify-content-between font-weight-bold text-secondary shadow  border ml-4">
                    <div >{{d.name}}</div>
                    <div>{{d.emergency_call[0].datetimezone}}</div>
            </div>
        </a>
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

</style>