<template>
    <div class="w-100 h-100">
      <div class="row h-50 w-100 d-flex justify-content-around ">
          <div class="col-4 ">
              <barchart/>
          </div>
          
          <div class="col-4 ">
              <donutchart :user = parseInt(user) :fisherman = parseInt(fisherman) :admin = parseInt(admin) />
          </div>
      </div>
      <div class="row h-50 w-100 d-flex justify-content-around">
          <div class="col-4">
              <polarchart  :sos = parseInt(sos) :sosp = parseInt(sosp) :sosd= parseInt(sosd) :loc= parseInt(coord) />
          </div>
          <div class="col-4">
              <Linechart/>
          </div>
      </div>
    </div>
</template>

<script>
import polarchart from './Charts/PolarChart.vue';
import barchart from './Charts/BarChart.vue';
import Linechart from './Charts/LineChart.vue'
import radialbar from './Charts/RadialChart.vue'
import donutchart from './Charts/DonutChart.vue';
export default {
    props:['user','fisherman','admin','sos','sosd','sosp','coord','barangay','city'],
    components:{barchart, Linechart, polarchart,radialbar, donutchart},
    mounted(){
        console.log("dashboard mounted");
    }
}
</script>

<style scoped>



</style>