<template>
<div class="w-100 h-100 row d-flex" >
 {{datum}}
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