<template>
<div class="w-100 h-100 pl-5">
    {{data}}
    <div class="row align-items-start">
        <div class="col-6">
            <img :src="'https://capstone-salvador-bucket.s3.us-east-2.amazonaws.com/'+ fish.image" alt="" class="image">
        </div>
        <div class="col-6 align-self-center ">
            <form @submit.prevent="submit()">
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
    <div class="row pt-3">
        <div class="col font-weight-bold">
            <div class="label">Common Name</div>
            <div class="text-secondary">{{fish.common_name}}</div>
        </div>
         <div class="col font-weight-bold">
             <div class="label">Local Name</div>
             <div class="text-secondary">{{fish.local_name}}</div>
         </div>
    </div>
   
</div>
    
</template>

<script>
export default {
    props:['data'],
    data(){
        return{
         fish:this.data,
         weight:"" 
        }
    },
   methods:{
       submit(){
           axios.post('/catch',{
               weight: this.weight,
               common_name: this.fish.common_name,
               local_name :this.fish.local_name,
           })
           .then(data => console.log(data))
           .catch(error => console.log(error))
       }
   }
}
</script>

<style scoped>
.image{
    border-radius: 50%;
    width: 75%;
}
.logo{
    width: 2rem;
    margin-right: rem;
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