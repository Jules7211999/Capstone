<template>
<div class="w-100 h-100">
     <div class=" p-4 row w-100 d-flex justify-content-center font-weight-bold text-secondary ml-1 ">
                    <div class="col">SOS ID</div>
                    <div class="col">Name</div>
                    <div class="col">Type</div>
                    <div class="col">Status</div>
                    <div class="col">Date Time</div>
                    <div class="col">Action</div>
            </div>
    <div v-for="d in waiting" class="d-flex justify-content-center align-items-center w-100 mb-2 ">
            <div v-if="d.user.barangay == barangay || role == 'SuperUser'" class=" p-4 row w-100 rounded font-weight-bold text-danger shadow-sm border ml-1">
                    <div class="col">\<a :href="'/emergency/'+d.id" class="text-danger">{{d.id}}</a></div>
                    <div  class="col"><a :href="'/emergency/'+d.id" class="text-danger">{{d.user.name}}</a></div>
                    <div class="col">{{d.type}}</div>
                    <div class="col">{{d.status}}</div>
                    <div class="col">{{d.datetimezone}}</div>
                    <div class="col"><button @click="accept(d.id,'Processing')" class="btn btn-outline-primary font-weight-bold">Accept</button></div>
            </div> 
    </div> 
   <div v-for="d in processing" class="d-flex justify-content-center align-items-center  w-100 mb-2 ">
            <div  v-if="d.user.barangay == barangay || role == 'SuperUser'" class=" p-4 row w-100 rounded font-weight-bold text-primary shadow-sm border ml-1 ">
                 <div  class="col"><a :href="'/emergency/'+d.id">{{d.id}}</a></div>
                    <div  class="col"><a :href="'/emergency/'+d.id">{{d.user.name}}</a></div>
                    <div class="col">{{d.type}}</div>
                    <div class="col">{{d.status}}</div>
                    <div class="col">{{d.datetimezone}}</div>
                    <div class="col"><button @click="accept(d.id,'Done')" class="btn btn-outline-success font-weight-bold">Done</button></div>
            </div> 
    </div>
     <div v-for="d in done" class="d-flex justify-content-center w-100 mb-2 ">
            <div  v-if="d.user.barangay == barangay || role == 'SuperUser'" class=" p-4 row w-100 rounded font-weight-bold text-success shadow-sm border ml-1 ">
                <div  class="col"><a :href="'/emergency/'+d.id" class="text-success">{{d.id}}</a></div>
                    <div  class="col"><a :href="'/emergency/'+d.id" class="text-success">{{d.user.name}}</a></div>
                    <div class="col">{{d.type}}</div>
                    <div class="col">{{d.status}}</div>
                    <div class="col">{{d.datetimezone}}</div>
                    <div class="col"></div>
            </div> 
    </div> 
</div>
    
</template>

<script>
export default {
    props:['barangay','role'],
    data(){
        return{
            waiting: {},
            processing:{},
            done:{},
            query:"",
        }
    },
methods:{
    accept(id,status){
        axios.put('/emergency/'+id,{
            status:status
        })
        .then(data => console.log(data))
        this.getSos();
        this.getSosUpdated();
        this.getSosDone();
      
    },
    getSos(){
        axios.get('/getSos')
        .then(data => this.waiting = data.data)
        .catch(error => console.log(error.response.data.message));
        
    },
    getSosUpdated(){
        axios.get('/getSosUpdated')
        .then(data => this.processing = data.data)
        .catch(error => console.log(error.response.data.message));

    },
    getSosDone(){
        axios.get('/getSosDone')
        .then(data => this.done = data.data)
        .catch(error => console.log(error.response.data.message));

    },
     search(){
            axios.post('/userSearch',{
                search : this.query,
            })
            .then(data => this.data = data.data)
            .catch(error =>console.log(error.errors.message))
        },
},
mounted(){
    this.getSos();
    this.getSosUpdated();
    this.getSosDone();
    
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