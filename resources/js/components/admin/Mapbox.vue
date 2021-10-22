<template>
<div class="w-100 h-100" >
 <div class="w-100 d-flex row mb-2">
      <div class="col-5">
        <select class=" w-100 form-control form-control-lg  bg-light font-weight-bold text-secondary" v-model="mapshow">
          <option selected>Location</option>
          <option>SOS</option>
        </select>
      </div>
      <div class="col-5">
        <input class="form-control form-control-lg w-100  bg-light text-secondary font-weight-bold" type="text" placeholder="Search User">
      </div>
 </div>
  <MglMap 
  :accessToken="accessToken" 
  :mapStyle="mapStyle" 
  :zoom ="zoom"
  :center="center"
  >
 <div v-for="d in datum.data"  >
   <div v-if="mapshow == 'Location'">
    <MglMarker :coordinates="[d.coordinates[0].longitude,d.coordinates[0].latitude]" >
        <MglPopup>
            <div class="font-weight-bold p-3 d-flex justify-content-center align-items-center">
              <div>
                <div class="d-flex"><span class="pr-2">Name:</span>{{d.name}}</div>
                <div class="d-flex"><span class="pr-2">Latitude:</span>{{d.coordinates[0].latitude}}</div>
                <div class="d-flex"><span class="pr-2">Longitude:</span>{{d.coordinates[0].longitude}}</div>
                <div class="d-flex"><span class="pr-2">Date and Time:</span>{{d.coordinates[0].datetimezone}}</div>
                <div class="d-flex"><span class="pr-2">Month:</span>{{d.coordinates[0].month_name}}</div>
                <div class="d-flex"><span class="pr-2">Day of the Week:</span>{{d.coordinates[0].day_of_week}}</div>
                <a :href="'/user/'+d.user_id"><div class="d-flex w-100 pt-2 justify-content-center">View Profile</div></a>
              </div>
            </div>
        </MglPopup>
      </MglMarker>
   </div>
</div>
<div v-for="d in sosData.data">
      <div v-if="mapshow == 'SOS'">
        <MglMarker :coordinates="[d.emergency_call[0].longitude,d.emergency_call[0].latitude]" :color="markerColor">
        <MglPopup>
            <div class="font-weight-bold p-3 d-flex justify-content-center align-items-center">
              <div>
                <div class="d-flex"><span class="pr-2">Name:</span>{{d.name}}</div>
                <div class="d-flex"><span class="pr-2">Latitude:</span>{{d.emergency_call[0].latitude}}</div>
                <div class="d-flex"><span class="pr-2">Longitude:</span>{{d.emergency_call[0].longitude}}</div>
                <div class="d-flex"><span class="pr-2">Date and Time:</span>{{d.emergency_call[0].datetimezone}}</div>
                <div class="d-flex"><span class="pr-2">Month:</span>{{d.emergency_call[0].month_name}}</div>
                <div class="d-flex"><span class="pr-2">Day of the Week:</span>{{d.emergency_call[0].day_of_week}}</div>
                <div class="d-flex"><span class="pr-2">Status:</span>{{d.emergency_call[0].status}}</div>
                <div class="d-flex"><span class="pr-2">Type:</span>{{d.emergency_call[0].type}}</div>
                <a :href="'/emergency/'+d.emergency_call[0].id"><div class="d-flex w-100 pt-2 justify-content-center">Details</div></a>
              </div>
            </div>
        </MglPopup>
            </MglMarker>
      </div>
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
      axios.get('/getLocation')
      .then(data => this.datum = data)
      .catch(error => console.log(error.response.data))
    },
    viewProfile(id){
      console.log(id);
    },
    getSos(){
        axios.get('/getSos')
        .then(data => this.sosData= data)
        .catch(error => console.log(error.response.data.message));
    },
    search(){
            axios.post('/searchUserLocation',{
                search : this.query,
            })
            .then(data => this.datum = data)
            .catch(error =>console.log(error.errors.message))
        }
  },
  mounted(){
    this.getLocation();
    this.getSos();
  },
  created(){
    Echo.channel('SOS.notification')
    .listen('SOSevent', (e) => {
        alert('event');
        this.getSos();
    });
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
      datum: {},
      sosData: {},
      markerColor :"red",
      query: '',
      mapshow: 'Location'
    };
  },
  created() {
    Echo.channel('SOS.notification')
    .listen('SOSevent', (e) => {
        this.getSos();
    });
    this.mapbox = Mapbox;
  }
};
</script>

<style scoped>

.mapboxgl-canvas{
  width: 100%;
  height: 100%;
  position: relative;
}
</style>