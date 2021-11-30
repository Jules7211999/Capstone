<template>
<div class="w-100 h-100 row d-flex" >
  <div class="col">
    <h4 class="font-weight-bold text-secondary">SOS</h4>
    <MglMap
    :accessToken="accessToken"
    :mapStyle="mapStyle"
    :zoom ="zoom"
    :center="center"
    >
     <div v-for="d in sosData.data">
          <div v-for="x in d.emergency_call">
           
              <MglMarker :coordinates="[x.longitude,x.latitude]" :color="markerColor">
              <MglPopup>
                  <div class="font-weight-bold p-3 d-flex justify-content-center align-items-center">
                    <div class="text-center">
                       <img :src="'https://capstone-salvador-bucket.s3.us-east-2.amazonaws.com/'+ d.profile_image" alt="" class="image">
                       <div class="d-flex"><span class="pr-2">Name:</span>{{d.id}}</div>
                      <div class="d-flex"><span class="pr-2">Name:</span>{{d.name}}</div>
                      <div class="d-flex"><span class="pr-2">Latitude:</span>{{x.latitude}}</div>
                      <div class="d-flex"><span class="pr-2">Longitude:</span>{{x.longitude}}</div>
                      <div class="d-flex"><span class="pr-2">Date and Time:</span>{{x.datetimezone}}</div>
                      <div class="d-flex"><span class="pr-2">Month:</span>{{x.month_name}}</div>
                      <div class="d-flex"><span class="pr-2">Day of the Week:</span>{{x.day_of_week}}</div>
                      <div class="d-flex"><span class="pr-2">Status:</span>{{x.status}}</div>
                      <div class="d-flex"><span class="pr-2">Type:</span>{{x.type}}</div>
                      <a :href="'/emergency/'+x.id"><div class="d-flex w-100 pt-2 justify-content-center">Details</div></a>
                    </div>
                  </div>
              </MglPopup>
                  </MglMarker>
            
          </div>
     </div>
     </MglMap>
  </div>

    <div class="col">
      <h4 class="font-weight-bold text-secondary">Location</h4>
    <MglMap
    :accessToken="accessToken"
    :mapStyle="mapStyle"
    :zoom ="zoom"
    :center="center"
    >
    
     <div v-for="d in datum.data" >
      <div v-for="x in d.coordinates">
        
        <MglMarker :coordinates="[x.longitude,x.latitude]" >
            <MglPopup>
                <div class="font-weight-bold p-3 d-flex justify-content-center align-items-center">
                  <div class="text-center">
                    <img :src="'https://capstone-salvador-bucket.s3.us-east-2.amazonaws.com/'+ d.profile_image" alt="" class="image">
                    <div class="d-flex"><span class="pr-2">Name:</span>{{d.name}}</div>
                    <div class="d-flex"><span class="pr-2">Latitude:</span>{{x.latitude}}</div>
                    <div class="d-flex"><span class="pr-2">Longitude:</span>{{x.longitude}}</div>
                    <div class="d-flex"><span class="pr-2">Date and Time:</span>{{x.datetimezone}}</div>
                    <div class="d-flex"><span class="pr-2">Month:</span>{{x.month_name}}</div>
                    <div class="d-flex"><span class="pr-2">Day of the Week:</span>{{x.day_of_week}}</div>
                    <a :href="'/user/'+d.id"><div class="d-flex w-100 pt-2 justify-content-center">View Profile</div></a>
                  </div>
                </div>
            </MglPopup>
          </MglMarker>
         
      </div>
     
    </div>  
    
     </MglMap>
  </div> 
  
</div> 
  
</template>

<script>
import Mapbox from "mapbox-gl";
import { MglMap,MglPopup, MglMarker  } from "vue-mapbox";

export default {
  props:['barangay_id'],
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
        axios.get('/getMapSos')
        .then(data => this.sosData= data)
        .catch(error => console.log(error.response.data.message));
    },
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

.image{
  border-radius: 50%;
  margin-bottom: 2rem;
  width: 50%;
}
</style>