<template>
    <div>
        {{id}}
    </div>
</template>

<script>
export default {
    props:['id'],
    methods:{
        getcatch(){
            axios.get('/getcatch/'+this.id)
        }
    }
}
</script>