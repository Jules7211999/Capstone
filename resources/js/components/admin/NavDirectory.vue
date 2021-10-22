<template>
    <div class="w-100 d-flex justify-content-end">
        <div class="w-75 pb-5">
            <span class="font-weight-bold pt-2 text-secondary">{{nav}}</span>
            </div>
    </div>
</template>

<script>
export default {
    props:['nav']
}
</script>
<style scoped>
span{
    font-size: 2rem;
}
</style>