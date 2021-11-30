<template>
    <div class="w-100 h-100">
      <div class="row h-25 w-100 d-flex justify-content-around ">
        <div class="col-3 d-flex justify-content-center align-items-center ">
          <div>
            <div class="font-weight-bold text-secondary"><img src="/img/sos_sent.png"  class="mr-2" alt="" srcset="">Sent SOS</div>
            <div class="text-center w-100 font-weight-bold text-secondary pt-3">{{sos}}</div>
          </div>
        </div>
         <div class="col-3 d-flex justify-content-center align-items-center  ">
          <div>
            <div class="font-weight-bold text-secondary"><img src="/img/sos_ongoing.png"  class="mr-2" alt="" srcset="">Ongoing SOS</div>
            <div class="text-center w-100 font-weight-bold text-secondary pt-3">{{sosp}}</div>
          </div>
        </div>
          <div class="col-3 d-flex justify-content-center align-items-center  ">
          <div>
            <div class="font-weight-bold text-secondary"><img src="/img/sos_success.png"  class="mr-2" alt="" srcset="">Completed SOS</div>
            <div class="text-center w-100 font-weight-bold text-secondary pt-3">{{sosd}}</div>
          </div>
        </div>
      </div>
       <div class="row h-25 w-100 d-flex justify-content-around ">
        <div class="col-3 d-flex justify-content-center align-items-center  ">
          <div>
            <div class="font-weight-bold text-secondary"><img src="/img/superadmin_dashboard.png"  class="mr-2" alt="" srcset="">Super Admin</div>
            <div class="text-center w-100 font-weight-bold text-secondary pt-3">{{user}}</div>
          </div>
        </div>
         <div class="col-3 d-flex justify-content-center align-items-center  ">
          <div>
            <div class="font-weight-bold text-secondary"><img src="/img/admin.png"  class="mr-2" alt="" srcset="">Admin</div>
            <div class="text-center w-100 font-weight-bold text-secondary pt-3">{{admin}}</div>
          </div>
        </div>
          <div class="col-3 d-flex justify-content-center align-items-center  ">
          <div>
            <div class="font-weight-bold text-secondary"><img src="/img/Users.svg"  class="mr-2" alt="" srcset="">Fisherman</div>
            <div class="text-center w-100 font-weight-bold text-secondary pt-3">{{fisherman}}</div>
          </div>
        </div>
      </div>
        <div class="row h-25 w-100 d-flex justify-content-around ">
        <div class="col-3 d-flex justify-content-center align-items-center  ">
          <div>
            <div class="font-weight-bold text-secondary"><img src="/img/city_dashboard.png"  class="mr-2" alt="" srcset="">City / Municipality</div>
            <div class="text-center w-100 font-weight-bold text-secondary pt-3">{{city}}</div>
          </div>
        </div>
         <div class="col-3 d-flex justify-content-center align-items-center  ">
          <div>
            <div class="font-weight-bold text-secondary"><img src="/img/barangay_dashboard.png"  class="mr-2" alt="" srcset="">Barangay</div>
            <div class="text-center w-100 font-weight-bold text-secondary pt-3">{{barangay}}</div>
          </div>
        </div>
         <div class="col-3 d-flex justify-content-center align-items-center  ">
          <div>
            <div class="font-weight-bold text-secondary"><img src="/img/total_lgu.png"  class="mr-2 image_total_lgu" alt="" srcset="">Total LGU</div>
            <div class="text-center w-100 font-weight-bold text-secondary pt-1">{{total_lgu}}</div>
          </div>
        </div>
      </div>
      <div class="row w-100 d-flex h-25 justify-content-center">
        <div class="col-3 d-flex justify-content-center align-items-center  ">
          <div>
            <div class="font-weight-bold text-secondary"><img src="/img/location.png"  class="mr-2" alt="" srcset="">Location Received</div>
            <div class="text-center w-100 font-weight-bold text-secondary pt-3">{{coord}}</div>
          </div>
        </div>
         <div class="col-3 d-flex justify-content-center align-items-center  ">
          <div>
            <div class="font-weight-bold text-secondary"><img src="/img/catch.png"  class="mr-2" alt="" srcset="">Fish Species</div>
            <div class="text-center w-100 font-weight-bold text-secondary pt-3">{{species}}</div>
          </div>
        </div>
         <div class="col-3 d-flex justify-content-center align-items-center  ">
          <div>
            <div class="font-weight-bold text-secondary"><img src="/img/net.png"  class="mr-2" alt="" srcset="">Total Catch</div>
            <div class="text-center w-100 font-weight-bold text-secondary pt-2">{{catchk}}</div>
          </div>
        </div>
      </div>
      <div class="row w-100 d-flex justify-content-center align-center-items">
        <a href="/report" target="_blank">
          <div class="d-flex align-items-center p-3 border m-2">
            <img src="/img/report.png" alt="" srcset="">
              <span class="font-weight-bold text-secondary">Report Log</span>
          </div>
        </a>
        <a href="/history">
           <div class="d-flex align-items-center p-3 border m-2">
            <img src="/img/history.png" alt="" srcset="">
              <span class="font-weight-bold text-secondary">Activity Log</span>
          </div>
        </a>
      </div>
    </div>
</template>

<script>
import polarchart1 from './Charts/PolarChartSos.vue';
import polarchart2 from './Charts/PolarChartLgu.vue';
import polarchart3 from './Charts/PolarChartUser.vue';


export default {
    props:['species','catchk','user','fisherman','admin','sos','sosd','sosp','coord','barangay','city'],
    components:{ polarchart1,polarchart2,polarchart3},
    mounted(){
        this.add();
    },
    data(){
      return{
        total_lgu: ""
      }
    },
    methods:{
      add(){
        this.total_lgu = parseInt(this.barangay) + parseInt(this.city)
      }
    }
}
</script>

<style scoped>

img{
  width: 3rem;
}

.image_total_lgu{
width: 4rem;
}

</style>