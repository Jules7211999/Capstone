<template>
<div class="w-100 h-100 pl-5">
    <div class="row align-items-start">
        <div class="col-6">
            <img :src="'https://capstone-salvador-bucket.s3.us-east-2.amazonaws.com/'+ fish.image" alt="" class="image">
        </div>
        <div class="col-6 align-self-center ">
            <div v-bind:class="{'text-danger': message == 'The given data was invalid.','text-success': message == 'Success'}" class="w-100  font-weight-bold mb-2">{{message}}</div>
            <form @submit.prevent="submit(fish.id)">
                 <input class="form-control-lg w-50 border font-weight-bold bg-transparent" v-model="weight" required placeholder="Enter Weight per Kilo">
            </form>
            <div class="w-50 text-center"><img src="/img/weight-scale.png" alt="" srcset="" class="w-25 pt-2"></div>
        </div>
    </div> 
     <div class="row mt-5 border-top pt-3">
        <div class="col font-weight-bold">
             <div class="label">ID</div>
             <div class="text-secondary">FISHDA{{fish.id}}34332</div>
        </div>
        <div class="col font-weight-bold"> 
            <div class="label">Phylum </div>
            <div class="text-secondary">{{fish.phylum}}</div>
        </div>
    </div>
    <div class="row pt-3">
        <div class="col font-weight-bold"> 
            <div class="label">Subphylum</div>
            <div class="text-secondary">{{fish.subphylum}}</div>
        </div>
            <div class="col font-weight-bold">
                <div class="label">Superclass</div>
                <div class="text-secondary">{{fish.superclass}}</div>
            </div>
    </div>
    <div class="row pt-3 border-bottom pb-3">
        <div class="col font-weight-bold">
            <div class="label">Common Name</div>
            <div class="text-secondary">{{fish.common_name}}</div>
        </div>
         <div class="col font-weight-bold">
             <div class="label">Local Name</div>
             <div class="text-secondary">{{fish.local_name}}</div>
         </div>
    </div>
    <div class="row pt-3">
        <div class="col">
            <h3 class="font-weight-bold">Recently Added</h3>
        </div>
    </div>
     <div class="w-100 pt-3">
         <div class="row pb-2 w-50">
             <div class="col-3 font-weight-bold text-secondary">Kilos</div>
             <div class="col-5 font-weight-bold text-secondary">Date and Time</div>
         </div>
         <div v-for="x in catch_fish" class="row w-50 pt-3 pb-3 mb-1  border">
                <div class="col-3 font-weight-bold text-secondary">{{x.kilos}}</div>
                <div class="col-5 font-weight-bold text-secondary">{{x.created_at}}</div>
         </div>
     </div>
   
</div>
    
</template>

<script>
export default {
    props:['data','barangay_id'],
    data(){
        return{
         fish:this.data,
         weight:"",
         message:"",
         errors:"",
         catch_fish:{}
        }
    },
   methods:{
       submit(id){
           axios.post('/catch',{
               weight: this.weight,
               fish_id: id, 
           })
           .then(data => this.message = data.data)
        .catch(error => this.message = error.response.data.message)
        this.weight =""

        this.getcatch();
       }
       ,
       getcatch(){
           axios.get('/getCatch/'+this.data.id+'/'+this.barangay_id)
           .then(data => this.catch_fish = data.data)
               
           
       }
   },
   mounted(){
       this.getcatch();
   }
}
</script>

<style scoped>
.report{
    width: 5rem;
}
.image{
    width: 50%;
}
.logo{
    width: 2rem;
    margin-bottom: 1rem;
}
span{
    font-weight: bold;
    font-size: 1rem;
}
label{
    font-weight: bold;
    font-size: 1rem;
}

h1{
    font-size: 2rem;
    font-weight: bold;
}
</style>