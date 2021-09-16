<template>
<!-- <div>
<div v-for="d in datum.data">
  {{d.longitude}}
  {{d.latitude}}
</div>

</div> -->


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
          <div>Hello, I'm popup!</div>
        </VCard>
      </MglPopup>
    </MglMarker>
</div>
  </MglMap>
  
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