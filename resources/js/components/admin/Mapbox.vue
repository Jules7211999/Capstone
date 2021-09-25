<template>
<div  class="w-100 h-100 shadow-lg">
 
  <MglMap 
  :accessToken="accessToken" 
  :mapStyle="mapStyle" 
  :zoom ="zoom"
  :center="center"

  >
 <div v-for="d in datum.data">
      <MglMarker :coordinates="[d.longitude,d.latitude]">
      <MglPopup>
        <VCard>
          <div class="font-weight-bold p-3 d-flex justify-content-center align-items-center">
            <div>
              <div class="d-flex"><span class="pr-2">Name:</span>{{d.user.name}}</div>
              <div class="d-flex"><span class="pr-2">Latitude:</span>{{d.latitude}}</div>
              <div class="d-flex"><span class="pr-2">Longitude:</span>{{d.longitude}}</div>
              <div class="d-flex"><span class="pr-2">Date and Time:</span>{{d.datetimezone}}</div>
              <div class="d-flex"><span class="pr-2">Month:</span>{{d.month_name}}</div>
              <div class="d-flex"><span class="pr-2">Day of the Week:</span>{{d.day_of_week}}</div>
              <a :href="'/user/'+d.user_id"><div class="d-flex w-100 pt-2 justify-content-center">View Profile</div></a>
            </div>
          </div>
        </VCard>
      </MglPopup>
    </MglMarker>
</div>
  </MglMap>
</div>


  
</template>

<script>
import Mapbox from "mapbox-gl";
import { MglMap,MglPopup, MglMarker  } from "vue-mapbox";

export default {
  methods:{
    getLocation(){
      axios.get('/GetLocation')
      .then(data => this.datum = data)
      .catch(error => console.log(error.response.data))
    },
    viewProfile(id){
      console.log(id);
    }
  },
  mounted(){
    this.getLocation();
  },
  components: {
    MglMap,
    MglMarker,
    MglPopup
  },
  data() {
    return {
      accessToken: "pk.eyJ1IjoianVsZXNsZW9tZWwiLCJhIjoiY2tzZmFiNDE1MThkNDJvb2RwaWZ0cDdlYSJ9.XsG9J74iDhCOOTW7pjk-Yw", // your access token. Needed if you using Mapbox maps
      mapStyle: "mapbox://styles/mapbox/streets-v11", // your map style
      center: [122.8500,10.2667 ],
      zoom: 8,
      datum: {}
    };
  },
  created() {
    // We need to set mapbox-gl library here in order to use it in template
    this.mapbox = Mapbox;
  }
};
</script>

<style scoped>

</style>