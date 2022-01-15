<template>
    <div class="w-100 h-100">
           <div class="w-100 justify-content-center d-flex mt-5 mb-5">
                <div class="col-5 text-dark text-center font-weight-bold">
                    <h2 class="font-weight-bold text-secondary" v-if="show" >Municipality / City<img src="/img/forward.png" alt="" class="arrow" @click="show = !show"></h2>
                    <h2 class="font-weight-bold text-secondary" v-if="show == false"><img src="/img/back.png" alt="" class="arrow" @click="show = !show"> Barangay </h2>
                </div>
            </div>
        <province v-if="show"/>
        <barangay v-if="show == false"/>
    </div>
</template>

<script>
import province from "./ProvinceCity.vue"
import barangay from "./Barangay.vue"

export default {
components:{province,barangay},
data(){
    return{
        show:true
    }
}
}
</script>

<style scoped>
 .arrow{
        width: 1.5rem;
    }
</style>>



