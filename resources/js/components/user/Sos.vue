<template>
    <div class="w-100 h-100">
       <form @submit.prevent="sendSOS()">
           <button type="submit">Emergency Signal</button>
       </form>
    </div>
</template>

<script>
export default {
    methods:{
        sendSOS(){
            console.log(
                axios.post('/sos')
                .then(data => console.log(data))
                .catch(error => console.log(error.response.data))
            )
        }
    }
}
</script>
<style scoped>

</style>