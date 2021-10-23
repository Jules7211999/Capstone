<template>
    <div class="w-100 h-100 rounded ml-3 mt-4">
       <div class="w-100 h-25 d-flex row">
        <div class=" col-3 font-weight-bold text-secondary d-flex align-items-center justify-content-center">
            <div class="text-center ">
                <h4 class="font-weight-bold">Registered User</h4>
                <h2 class="font-weight-bold">{{user}}</h2>
            </div>
        </div>
        <div class=" col-3 font-weight-bold text-secondary  d-flex align-items-center justify-content-center">
            <div class="text-center ">
                <h4 class="font-weight-bold">Location Received</h4>
                <h2 class="font-weight-bold">{{coord}}</h2>
            </div>
        </div>
        <div class=" col-3 ont-weight-bold text-secondary  d-flex align-items-center justify-content-center">
            <div class="text-center ">
                <h4 class="font-weight-bold">Email Verified</h4>
                <h2 class="font-weight-bold">{{email}}</h2>
            </div>
        </div>
         <div class=" col-3 ont-weight-bold text-secondary  d-flex align-items-center justify-content-center">
            <div class="text-center ">
                <h4 class="font-weight-bold">SOS Received</h4>
                <h2 class="font-weight-bold">{{sos}}</h2>
            </div>
        </div>
       </div>
       <div class="row w-100 h-50">

       </div>
    </div>
</template>

<script>
export default {
    props:['user', 'email','coord','sos'],
    mounted(){
        console.log("dashboard mounted");
    }
}
</script>

<style scoped>


</style>