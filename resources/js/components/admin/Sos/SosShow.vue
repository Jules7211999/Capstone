<template>
    <div class="w-100 h-50">
        <MglMap 
            :accessToken="accessToken" 
            :mapStyle="mapStyle" 
            :zoom ="zoom"
            :center="center"
        >
        <MglMarker :coordinates="[eData.longitude,eData.latitude]" :color ="markerColor"/>
        </MglMap>
        {{eData}}
        <a :href="'/user/'+eData.user.id">View Profile</a>
    </div>
</template>
<script>
import { MglMap, MglMarker  } from "vue-mapbox";

export default {
    components:{MglMap,MglMarker},
    props:['data'],
    data(){
        return{
        eData : this.data,
        accessToken: "pk.eyJ1IjoianVsZXNsZW9tZWwiLCJhIjoiY2tzZmFiNDE1MThkNDJvb2RwaWZ0cDdlYSJ9.XsG9J74iDhCOOTW7pjk-Yw", // your access token. Needed if you using Mapbox maps
        mapStyle: "mapbox://styles/mapbox/streets-v11", // your map style
        center: [122.8500,10.2667 ],
        markerColor :"red",
        zoom: 7,
        }
    }
}
</script>
<style scoped>

</style>