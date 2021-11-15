<template>
    <div class="w-100 h-100 rounded ml-3 mt-4">
        <div class="w-100 ">
            <button>change view</button>
        </div>
       <div class="w-100  d-flex row justify-content-center align-items-center ">
        <div class=" col-3 font-weight-bold text-secondary d-flex align-items-center justify-content-center">
            <div class="text-center ">
                <h4 class="font-weight-bold">Total Users</h4>
                <h2 class="font-weight-bold">{{user}}</h2>
            </div>
        </div>
        <div class=" col-3 font-weight-bold text-secondary d-flex align-items-center justify-content-center">
            <div class="text-center ">
                <h4 class="font-weight-bold">Location Received</h4>
                <h2 class="font-weight-bold">{{coord}}</h2>
            </div>
        </div>
         <div class=" col-3 ont-weight-bold text-secondary  d-flex align-items-center justify-content-center">
            <div class="text-center ">
                <h4 class="font-weight-bold">SOS Received</h4>
                <h2 class="font-weight-bold">{{sos}}</h2>
            </div>
        </div>
         <div class=" col-3 ont-weight-bold text-secondary  d-flex align-items-center justify-content-center">
            <div class="text-center ">
                <h4 class="font-weight-bold">SOS Completed</h4>
                <h2 class="font-weight-bold">{{sosr}}</h2>
            </div>
        </div>
       </div>
       <div class="w-100  d-flex row p-5 justify-content-center align-items-center  ">
        <div class=" col-3 font-weight-bold text-secondary d-flex align-items-center justify-content-center">
            <div class="text-center ">
                <h4 class="font-weight-bold">Registered Admin</h4>
                <h2 class="font-weight-bold">{{admin}}</h2>
            </div>
        </div>
        <div class=" col-3 font-weight-bold text-secondary  d-flex align-items-center justify-content-center">
            <div class="text-center ">
                <h4 class="font-weight-bold">Registered Fisherman</h4>
                <h2 class="font-weight-bold">{{fisherman}}</h2>
            </div>
        </div>
         <div class=" col-3 ont-weight-bold text-secondary  d-flex align-items-center justify-content-center">
            <div class="text-center ">
                <h4 class="font-weight-bold">Fish Species</h4>
                <h2 class="font-weight-bold">{{fish}}</h2>
            </div>
        </div>
       </div>
         <div class="w-100  d-flex row justify-content-center align-items-center ">
        <div class=" col-3 font-weight-bold text-secondary d-flex align-items-center justify-content-center">
            <div class="text-center ">
                <h4 class="font-weight-bold">Registered Cities</h4>
                <h2 class="font-weight-bold">{{city}}</h2>
            </div>
        </div>
        <div class=" col-3 font-weight-bold text-secondary  d-flex align-items-center justify-content-center">
            <div class="text-center ">
                <h4 class="font-weight-bold">Registered Barangays</h4>
                <h2 class="font-weight-bold">{{barangay}}</h2>
            </div>
        </div>
       </div>
    </div>
</template>

<script>
export default {
    props:['user','coord','sos','barangay','city','fisherman','admin','fish','sosr'],
    mounted(){
        console.log("dashboard mounted");
    }
}
</script>

<style scoped>

.row{
    height: 33%;
}
</style>