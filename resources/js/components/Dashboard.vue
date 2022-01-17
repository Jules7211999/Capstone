<template>
    <div class="w-100 h-100">
      <div class="row h-25 w-100 d-flex justify-content-around ">
        <div class="col-3 d-flex justify-content-center align-items-center ">
          <div class="row border rounded p-3">
            <div class="col-3"><img src="/img/sos_sent.png" alt="" srcset=""></div>
            <div class="col-9 text-center">
              <div class="font-weight-bold text-secondary">Sent SOS</div>
              <div class="text-center w-100 font-weight-bold text-secondary ">{{sos}}</div>
            </div>
          </div>
        </div>
         <div class="col-3 d-flex justify-content-center align-items-center  ">
          <div class="row border rounded p-3">
            <div class="col-3"><img src="/img/sos_ongoing.png"  class="mr-2" alt="" srcset=""></div>
            <div class="col-9 text-center">
              <div class="font-weight-bold text-secondary">Ongoing SOS</div>
              <div class="text-center w-100 font-weight-bold text-secondary">{{sosp}}</div>
            </div>
          </div>
        </div>
          <div class="col-3 d-flex justify-content-center align-items-center  ">
          <div class="row border rounded p-3">
            <div class="col-3"><img src="/img/sos_success.png"  class="mr-2" alt="" srcset=""></div>
            <div class="col-9 text-center">
              <div class="font-weight-bold text-secondary">Completed SOS</div>
              <div class="text-center w-100 font-weight-bold text-secondary">{{sosd}}</div>
            </div>
          </div>
        </div>
         <div class="col-3 d-flex justify-content-center align-items-center  ">
          <div class="row border rounded p-3">
            <div class="col-3"><img src="/img/cancel.png"  class="mr-2" alt="" srcset=""></div>
            <div class="col-9 text-center">
              <div class="font-weight-bold text-secondary">Canceled SOS</div>
              <div class="text-center w-100 font-weight-bold text-secondary">{{sosc}}</div>
            </div>
          </div>
        </div>
      </div>
       <div class="row h-25 w-100 d-flex justify-content-around ">
        <div class="col-3 d-flex justify-content-center align-items-center  ">
          <div class="row border rounded p-3">
            <div class="col-3"><img src="/img/superadmin_dashboard.png"  class="mr-2" alt="" srcset=""></div>
            <div class="col-9 text-center">
              <div class="font-weight-bold text-secondary">Super Admin</div>
              <div class="text-center w-100 font-weight-bold text-secondary">{{user}}</div>
            </div>
          </div>
        </div>
         <div class="col-3 d-flex justify-content-center align-items-center  ">
          <div class="row border rounded p-3">
            <div class="col-3"><img src="/img/admin.png"  class="mr-2" alt="" srcset=""></div>
            <div class="col-9 text-center">
              <div class="font-weight-bold text-secondary">Admin</div>
              <div class="text-center w-100 font-weight-bold text-secondary">{{admin}}</div>
            </div>
          </div>
        </div>
          <div class="col-3 d-flex justify-content-center align-items-center  ">
          <div class="row border rounded p-3">
            <div class="col-3"><img src="/img/Users.svg"  class="mr-2" alt="" srcset=""></div>
            <div class="col-9 text-center">
              <div class="font-weight-bold text-secondary">Fisherman</div>
              <div class="text-center w-100 font-weight-bold text-secondary">{{fisherman}}</div>
            </div>
          </div>
        </div>
      </div>
        <div class="row h-25 w-100 d-flex justify-content-around ">
        <div class="col-3 d-flex justify-content-center align-items-center  ">
          <div class="row border rounded p-3">
            <div class="col-3"><img src="/img/city_dashboard.png"  class="mr-2" alt="" srcset=""></div>
            <div class="col-9 text-center">
              <div class="font-weight-bold text-secondary">City / Municipality</div>
              <div class="text-center w-100 font-weight-bold text-secondary">{{city}}</div>
            </div>
          </div>
        </div>
         <div class="col-3 d-flex justify-content-center align-items-center  ">
          <div class="row border rounded p-3">
            <div class="col-3"><img src="/img/barangay_dashboard.png"  class="mr-2" alt="" srcset=""></div>
            <div class="col-9 text-center">
              <div class="font-weight-bold text-secondary">Barangay</div>
              <div class="text-center w-100 font-weight-bold text-secondary">{{barangay}}</div>
            </div>
          </div>
        </div>
         <div class="col-3 d-flex justify-content-center align-items-center  ">
          <div class="row border rounded p-3">
            <div class="col-3"><img src="/img/total_lgu.png"  class="mr-2 image_total_lgu" alt="" srcset=""></div>
            <div class="col-9 text-center">
              <div class="font-weight-bold text-secondary">Total LGU</div>
              <div class="text-center w-100 font-weight-bold text-secondary pt-1">{{total_lgu}}</div>
            </div>
          </div>
        </div>
      </div>
      <div class="row w-100 d-flex h-25 justify-content-around">
        <div class="col-3 d-flex justify-content-center align-items-center  ">
          <div class="row border rounded p-3">
            <div class="col-3"><img src="/img/location.png"  class="mr-2" alt="" srcset=""></div>
            <div class="col-9 text-center">
              <div class="font-weight-bold text-secondary">Location Received</div>
              <div class="text-center w-100 font-weight-bold text-secondary">{{coord}}</div>
            </div>
          </div>
        </div>
         <div class="col-3 d-flex justify-content-center align-items-center  ">
          <div class="row border rounded p-3">
            <div class="col-3"><img src="/img/catch.png"  class="mr-2" alt="" srcset=""></div>
            <div class="col-9 text-center">
              <div class="font-weight-bold text-secondary">Fish Species</div>
              <div class="text-center w-100 font-weight-bold text-secondary">{{species}}</div>
            </div>
          </div>
        </div>
         <div class="col-3 d-flex justify-content-center align-items-center  ">
          <div class="row border rounded p-3">
            <div class="col-3"><img src="/img/net.png"  class="mr-2" alt="" srcset=""></div>
            <div class="col-9 text-center">
              <div class="font-weight-bold text-secondary">Total Catch</div>
              <div class="text-center w-100 font-weight-bold text-secondary pt-2">{{catchk}}</div>
            </div>
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
        <a href="/history" target="_blank">
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
    props:['species','catchk','user','fisherman','admin','sos','sosd','sosp','coord','barangay','city','sosc'],
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