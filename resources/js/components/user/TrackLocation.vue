<template>
<div>
<slot></slot>
</div>
</template>

<script>
export default {
    methods:{
        success(position){
                 axios.post('/track',{
                       lat: position.coords.latitude,
                       long: position.coords.longitude
                   }).catch(err => console.log(err.response.data.message));
        },
        error(){
            window.location.href="/geoerror";
        }
    },
    mounted(){
             navigator.geolocation.watchPosition(this.success, this.error);
    }
}
</script>
