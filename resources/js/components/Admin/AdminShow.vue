<template>
<div class="w-100 h-100 pl-5">
    <div class="row align-items-start">
        <div class="col-3">
            <img :src="'https://capstone-salvador-bucket.s3.us-east-2.amazonaws.com/'+ profile[0].profile_image" alt="" class="image">
        </div>
        <div class="col-5 align-self-center">
            <div><span><h1>{{profile[0].name}}</h1></span></div>
        </div>
        <div class="col-4 d-flex">
                <div class="d-flex align-items-center justify-content-center w-25">
                    <a :href="'/admin/'+profile[0].id+'/edit'"><img src="/img/edit.png" class="w-50"></a>
            </div>
             <div class="d-flex align-items-center justify-content-center w-25">
                    <a :href="'/delete/'+profile[0].id"><img src="/img/trash.png" class="w-50"></a>
                </div>
        </div>
    </div>
    <div class="row mt-5 border-top pt-3">
        <div class="col font-weight-bold">
             <div class="label">ID</div>
             <div class="text-secondary">{{profile[0].id}}</div>
        </div>
        <div class="col font-weight-bold"> 
            <div class="label">Email</div>
            <div class="text-secondary">{{profile[0].email}}</div>
        </div>
    </div>
    <div class="row pt-3">
        <div class="col font-weight-bold">
            <div class="label">Phone Number</div>
            <div class="text-secondary">{{profile[0].phone_number}}</div>
        </div>
            <div class="col font-weight-bold">
                <div class="label">Address</div>
                <div class="text-secondary">{{profile[0].address}}</div>
            </div>
    </div>
    <div class="row pt-3">
        <div class="col font-weight-bold">
            <div class="label">Barangay</div>
            <div class="text-secondary">{{profile[0].barangay.name}}</div>
        </div>
         <div class="col font-weight-bold">
             <div class="label">City</div>
             <div class="text-secondary">{{profile[0].city.name}}</div>
         </div>
    </div>
      <div class="row pt-3">
        <div class="col font-weight-bold">
            <div class="label">Marital Status</div>
            {{profile[0].marital_status}}
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