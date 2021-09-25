<template>
    <div class="w-100 h-100">
       <form @submit.prevent="sendSOS()">
           <button type="submit">Emergency Signal</button>
       </form>
    </div>
</template>

<script>
export default {
    data(){
        return {

        }
    },
    methods:{
        sendSOS(){
           navigator.geolocation.getCurrentPosition(
            function success(position){
                axios.post('/sos',{
                    latitude: position.coords.latitude,
                    longitude: position.coords.longitude,
                })
                .then(data => console.log(data))
                .catch(error => console.log(error.response.data.message))
           },
           function error(){
               console.log("error");
           }
           );

        }
    }
}
</script>
<style scoped>

</style>