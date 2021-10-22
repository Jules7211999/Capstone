<template>
<div class="w-100 h-100 pl-5">
    <div class="row align-items-start">
        <div class="col-3">
            <img :src="'/img/'+profile.profile_image" class="w-75 rounded-center">
        </div>
        <div class="col-5 align-self-center">
            <div><span><h1>{{profile.name}}</h1></span></div>
            <div><span class="text-muted">{{profile.phone_number}}</span></div>
        </div>
        <div class="col-4">
                <div class="d-flex align-items-center justify-content-center w-25">
                    <!-- <img src="/img/delete.png"  class="w-25" @click="remove(profile.id)"> -->
                    <a :href="'/admin/'+profile.id+'/edit'"><img src="/img/edit.png" class="w-50"></a>
            </div>
        </div>
    </div>
    <div class="row mt-5 border-top pt-3">
        <div class="col ">
            <div>
                <div>
                    <img src="/img/Address.svg" alt="" class="logo">
                    <label class="text-muted">Address</label>
                </div>
                
                <div>
                    <span  class="text-muted">{{profile.address}}</span>
                </div>
                
            </div>
           <div>
               <div>
                   <img src="/img/Birthday.svg" alt="" class="logo">
                <label class="text-muted" >Birthdate</label>
               </div>
                <div>
                    <span  class="text-muted">{{profile.birthdate}}</span>
                </div>
           </div>
           <div>
               <div>
                   <img src="/img/Gender.svg" alt="" class="logo">
                   <label class="text-muted">Gender</label>
               </div>
                <div>  
                    <span  class="text-muted">{{profile.gender}}</span>
                </div>
                
           </div>
           
        </div>
        <div class="col">
            <div>
                <div>
                    <img src="/img/DateCreated.svg" alt="" class="logo">
                    <label class="text-muted">Date Profile Created</label>
                </div>
                <div>
                     <span  class="text-muted">{{profile.created_at}}</span>
                </div>
            </div>
        </div>
        
       
    </div>
   
</div>
    
</template>

<script>
export default {
    props:['data'],
    data(){
        return{
         profile:this.data
        }
    },
    methods:{
         remove(id){
            axios.post('/softDelete',{
               userId:id
            })
            .then(data => console.log(data))
            .catch(error => console.log(error));
            location.href="/admin"
        }
    },
   mounted(){
       
   }
}
</script>

<style scoped>
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