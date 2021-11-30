<template>
    <div class="w-100 h-100 d-flex">
        <div class="col">
            <MglMap
                :accessToken="accessToken"
                :mapStyle="mapStyle"
                :zoom ="zoom"
                :center="[eData.longitude,eData.latitude ]"
            >
                <MglMarker :coordinates="[eData.longitude,eData.latitude]" :color ="markerColor">
                </MglMarker>
            </MglMap>
        </div>
        <div class=" col font-weight-bold p-3 d-flex justify-content-center align-items-center">
                    <div>
                        <div class="d-flex  pb-5"><img src="" alt="" srcset=""></div>
                         <div class="d-flex pb-5"><span class="pr-2">SOS ID</span>{{eData.id}}</div>
                        <div class="d-flex pb-5"><span class="pr-2">Name:</span>{{eData.user.name}}</div>
                        <div class="d-flex pb-5"><span class="pr-2">Latitude:</span>{{eData.latitude}}</div>
                        <div class="d-flex pb-5"><span class="pr-2">Longitude:</span>{{eData.longitude}}</div>
                        <div class="d-flex pb-5"><span class="pr-2">Date and Time:</span>{{eData.datetimezone}}</div>
                        <div class="d-flex pb-5"><span class="pr-2">Accepted:</span>{{eData.dtz_accepted}}</div>
                        <div class="d-flex pb-5"><span class="pr-2">Finished:</span>{{eData.dtz_finished}}</div>
                        <div class="d-flex pb-5"><span class="pr-2">Month:</span>{{eData.month_name}}</div>
                        <div class="d-flex pb-5"><span class="pr-2">Day of the Week:</span>{{eData.day_of_week}}</div>
                        <div class="d-flex pb-5"><span class="pr-2">Type:</span>{{eData.type}}</div>
                        <a :href="'/user/'+eData.user.id"><div class="d-flex w-100 pt-2 justify-content-center">View Profile</div></a>
                    </div>
                    </div>
        </div>
</template>
<script>
import { MglMap, MglMarker,MglPopup  } from "vue-mapbox";

export default {
    components:{MglMap,MglMarker,MglPopup},
    props:['data'],
    data(){
        return{
        eData : this.data,
        accessToken: "pk.eyJ1IjoianVsZXNsZW9tZWwiLCJhIjoiY2tzZmFiNDE1MThkNDJvb2RwaWZ0cDdlYSJ9.XsG9J74iDhCOOTW7pjk-Yw", // your access token. Needed if you using Mapbox maps
        mapStyle: "mapbox://styles/mapbox/streets-v11", // your map style
        center: [122.8500,10.2667 ],
        markerColor :"red",
        zoom: 12,
        }
    }
}
</script>
<style scoped>

</style>