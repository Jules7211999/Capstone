<template>
    <div class="w-100 h-100">
         <div class="row w-100 h-25 border">
             <div class="col-5 d-flex justify-content-start pl-5 align-items-center">
                <img src="/img/profile-user.svg" alt="" class="w-25">
             </div>
         </div>
         <div class="row w-100 h-25">
             <div class="col-5">
                 <h5 class="font-weight-bold text-secondary">Email</h5>
                 <h5 class="font-weight-bold text-secondary">Phone Number</h5>
                 <h5 class="font-weight-bold text-secondary">Gender</h5>
                 <h5 class="font-weight-bold text-secondary">Birthdate</h5>
             </div>
             <div class="col-5">
                 <h5 class="font-weight-bold text-secondary">{{email}}</h5>
                 <h5 class="font-weight-bold text-secondary">{{phone_number}}</h5>
                 <h5 class="font-weight-bold text-secondary">{{gender}}</h5>
                 <h5 class="font-weight-bold text-secondary">{{birthdate}}</h5>
             </div>
         </div>
    </div>    
</template>

<script>
export default {
    props:['email','phone_number','gender','birthdate'],
    data(){
        return{
            data: this.user
        }
    }
}

</script>

<style scoped>

</style>