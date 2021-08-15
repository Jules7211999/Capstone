<template>
<div>
    
</div>
   
</template>

<script>
export default {
    data(){
        return{
           
        }
    },
    methods:{
        success(position){
                 axios.post('/track',{
                       lat: position.coords.latitude,
                       long: position.coords.longitude
                   }).catch(err => console.log(err));
        },
        error(){
            console.log("error");
        }
    },
    mounted(){
                 navigator.geolocation.watchPosition(this.success, this.error);
    }
}
</script>
