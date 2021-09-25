<template>
    <div>
        <addmessage/>
    </div>
</template>

<script>
import addmessage from './AddMessage.vue';

export default {
    components:{addmessage},
    mounted(){
        console.log('messages mounted')
    }
}
</script>

<style scoped>

</style>