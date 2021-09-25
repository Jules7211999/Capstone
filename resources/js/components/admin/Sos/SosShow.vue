<template>
    <div>
        {{emergencyData}}
        <a :href="'/user/'+emergencyData.user.id">View Profile</a>
    </div>
</template>
<script>
export default {
    props:['data'],
    data(){
        return{
            emergencyData : this.data
        }
    }
}
</script>
<style scoped>

</style>