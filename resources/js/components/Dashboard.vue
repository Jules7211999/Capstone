<template>
    <div class="w-100 h-100">
      <div class="row h-50 w-100 d-flex justify-content-around ">
          <div class="col-3">
            <polarchart-1 :sos= parseInt(sos) :sosp = parseInt(sosp) :sosd= parseInt(sosd) />
          </div>
          <div class="col-3">
            <polarchart-2 :barangay = parseInt(city) :city = parseInt(city) />
          </div>
          <div class="col-3">
            <polarchart-3 :superuser= parseInt(this.user) :admin = parseInt(this.admin) :fisherman = parseInt(this.fisherman) />
          </div>
      </div>
      <div class="row w-100 d-flex justify-content-center">
        <div class="col-6">
          <columnchart1/>
        </div>
      </div>
    </div>
</template>

<script>
import polarchart1 from './Charts/PolarChartSos.vue';
import polarchart2 from './Charts/PolarChartLgu.vue';
import polarchart3 from './Charts/PolarChartUser.vue';


export default {
    props:['user','fisherman','admin','sos','sosd','sosp','coord','barangay','city'],
    components:{ polarchart1,polarchart2,polarchart3},
    mounted(){
        console.log("dashboard mounted");
    }
}
</script>

<style scoped>



</style>